<?php

namespace haqqi\metronic\widgets;

use haqqi\metronic\Metronic;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

/**
 * Class SidebarMenu
 * 
 * Taken from https://github.com/dlds/yii2-metronic/blob/master/widgets/Menu.php with improvisation
 *
 * @author Haqqi <me@haqqi.net>
 * @package haqqi\metronic\widgets
 */
class SidebarMenu extends Menu
{
    public $activateParents = true;
    
    public $firstItemCssClass = 'start';

    public $lastItemCssClass = 'last';

    public $submenuTemplate = "\n<ul class='sub-menu'>\n{items}\n</ul>\n";

    public $linkTemplate = '<a href="{url}">{icon}{label}{badge}{arrow}</a>';

    public function init()
    {
        parent::init();

        $this->_initOptions();
    }

    public function run()
    {
        // begin sidebar
        echo Html::beginTag('div', ['class' => 'page-sidebar-wrapper']);
        echo Html::beginTag('div', ['class' => 'page-sidebar navbar-collapse collapse']);

        parent::run();

        echo Html::endTag('div');
        echo Html::endTag('div'); // end sidebar
    }

    protected function renderItems($items, $level = 1)
    {
        $n = count($items);
        $lines = [];
        foreach ($items as $i => $item)
        {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $class = [];
            if ($item['active'])
            {
                $class[] = $this->activeCssClass;
            }
            if ($i === 0 && $this->firstItemCssClass !== null)
            {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null)
            {
                $class[] = $this->lastItemCssClass;
            }
            if (!empty($class))
            {
                if (empty($options['class']))
                {
                    $options['class'] = implode(' ', $class);
                }
                else
                {
                    $options['class'] .= ' ' . implode(' ', $class);
                }
            }

            // set parent flag
            $item['level'] = $level;
            $menu = $this->renderItem($item);
            if (!empty($item['items']))
            {
                $menu .= strtr($this->submenuTemplate, [
                    '{items}' => $this->renderItems($item['items'], $level + 1),
                ]);
            }
            $lines[] = Html::tag($tag, $menu, $options);
        }
        return implode("\n", $lines);
    }

    protected function renderItem($item)
    {
        return strtr(ArrayHelper::getValue($item, 'template', $this->linkTemplate), [
            '{url}' => $this->_pullItemUrl($item),
            '{label}' => $this->_pullItemLabel($item),
            '{icon}' => $this->_pullItemIcon($item),
            '{arrow}' => $this->_pullItemArrow($item),
            '{badge}' => $this->_pullItemBadge($item),
        ]);
    }

    /**
     * Pulls out item url
     * @param array $item given item
     * @return string item url
     */
    private function _pullItemUrl($item)
    {
        $url = ArrayHelper::getValue($item, 'url', '#');

        if ('#' === $url)
        {
            return 'javascript:;';
        }

        return Url::toRoute($item['url']);
    }

    /**
     * Pulls out item label
     * @param array $item given item
     * @return string item label
     */
    private function _pullItemLabel($item)
    {
        $label = ArrayHelper::getValue($item, 'label', '');

        $level = ArrayHelper::getValue($item, 'level', 1);

        if (1 == $level)
        {
            return Html::tag('span', $label, ['class' => 'title']);
        }

        return sprintf(' %s', $label);
    }

    /**
     * Pulls out item icon
     * @param array $item given item
     * @return string item icon
     */
    private function _pullItemIcon($item)
    {
        $icon = ArrayHelper::getValue($item, 'icon', null);

        if ($icon)
        {
            return Html::tag('i', '', ['class' => $icon]);
        }

        return '';
    }

    /**
     * Pulls out item arrow
     * @param array $item given item
     * @return string item arrow
     */
    private function _pullItemArrow($item)
    {
        $active = ArrayHelper::getValue($item, 'active', false);

        $level = ArrayHelper::getValue($item, 'level', 1);

        $items = ArrayHelper::getValue($item, 'items', []);

        if (!empty($items))
        {
            return Html::tag('span', '', ['class' => 'arrow' . ($active ? ' open' : '')]);
        }

        return '';
    }

    /**
     * Pulls out item badge
     * @param array $item given item
     * @return string item badge
     */
    private function _pullItemBadge($item)
    {
        return ArrayHelper::getValue($item, 'badge', '');
    }

    /**
     * Inits options
     */
    private function _initOptions()
    {
        Html::addCssClass($this->options, 'page-sidebar-menu');

        if (Metronic::SIDEBAR_MENU_HOVER === Metronic::getComponent()->sidebarMenu)
        {
            Html::addCssClass($this->options, 'page-sidebar-menu-hover-submenu');
        }

        $this->options['data-slide-speed'] = 200;
        $this->options['data-auto-scroll'] = 'true';
        $this->options['data-keep-expanded'] = 'false';
        $this->options['data-height'] = 261;
    }
}