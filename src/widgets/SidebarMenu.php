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
 * Inspired from https://github.com/dlds/yii2-metronic/blob/master/widgets/Menu.php with improvisation
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

    public $linkTemplate = '<a {attr}>{icon}{label}{selected}{badge}</a>';

    public $headingTemplate = '<h3 class="uppercase">{label}</h3>';

    public function __construct(array $config = [])
    {
        $this->items = require(\Yii::getAlias(Metronic::getComponent()->sidebarMenuItemFile));

        parent::__construct($config);
    }


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

        $n     = count($items);
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag     = ArrayHelper::remove($options, 'tag', 'li');
            $class   = [];

            // normalize heading


            if ($item['active']) {
                $class[] = $this->activeCssClass;
            }
            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
                $class[] = $this->lastItemCssClass;
            }

            // normalize url that has subs. if active, add class open.
            if (!empty($item['items']) && $item['active']) {
                $class[] = 'open';
            }

            // set parent flag
            $item['level'] = $level;

            // overwrite class for heading
            if ($this->_isHeading($item)) {
                $options['class'] = 'heading';
            }

            Html::addCssClass($options, $class);

            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
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
        if ($this->_isHeading($item)) {
            $template = ArrayHelper::getValue($item, 'template', $this->headingTemplate);

            return strtr($template, [
                '{label}' => ArrayHelper::getValue($item, 'label', ''),
            ]);
        }

        return strtr(ArrayHelper::getValue($item, 'template', $this->linkTemplate), [
            '{attr}'  => $this->_formatItemAttr($item),
            '{icon}'  => $this->_formatItemIcon($item),
            '{label}' => $this->_formatItemLabel($item),
            '{badge}' => $this->_formatItemBadge($item),
            '{selected}' => $this->_formatItemSelected($item)
        ]);
    }

    /**
     * Check if the item is a heading or not
     *
     * @param $item
     * @return bool
     */
    private function _isHeading($item)
    {
        return (
            $item['level'] === 1 &&
            empty(ArrayHelper::getValue($item, 'url', null)) &&
            empty(ArrayHelper::getValue($item, 'items', null))
        );
    }

    /**
     * Format out item url
     * @param array $item given item
     * @return string item url
     */
    private function _formatItemAttr($item)
    {
        $options = [
            'class' => 'nav-link',
            'href' => ArrayHelper::getValue($item, 'url', '#')
        ];
        
        if(!empty($item['items'])) {
            Html::addCssClass($options, 'nav-toggle');
            $options['href'] = 'javascript:void(0);';
        } else {
            // route the url
            $options['href'] = \Yii::$app->urlManager->createUrl($options['href']);
        }
        
        return Html::renderTagAttributes($options);
    }

    /**
     * Pulls out item label
     * @param array $item given item
     * @return string item label
     */
    private function _formatItemLabel($item)
    {
        $label = ArrayHelper::getValue($item, 'label', '');

        return sprintf(Html::tag('span', $label, ['class' => 'title']));
    }

    /**
     * Pulls out item icon
     * @param array $item given item
     * @return string item icon
     */
    private function _formatItemIcon($item)
    {
        $icon = ArrayHelper::getValue($item, 'icon', null);

        if ($icon) {
            // add space after icon
            return $icon . ' ';
        }

        return '';
    }
    
    private function _formatItemSelected($item) {
        if($item['level'] == 1 && $item['active']) {
            return Html::tag('span', '', ['class' => 'selected']);
        }
        return '';
    }

    /**
     * Pulls out item badge
     * @param array $item given item
     * @return string item badge
     */
    private function _formatItemBadge($item)
    {
        // only show badge or arrow

        $badge = ArrayHelper::getValue($item, 'badge', null);

        if ($badge !== null) {
            return $badge;
        } else {
            if (!empty($item['items'])) {
                $options = [
                    'class' => 'arrow'
                ];
                if($item['active']) {
                    Html::addCssClass($options, 'open');
                }
                return Html::tag('span', '', $options);
            }
        }

        return '';
    }

    /**
     * Inits options
     */
    private function _initOptions()
    {
        Html::addCssClass($this->options, 'page-sidebar-menu');
        
        if(ArrayHelper::getValue($_COOKIE, 'sidebar_closed', 0)) {
            Html::addCssClass($this->options, 'page-sidebar-menu-closed');
        }

        if (Metronic::SIDEBAR_MENU_HOVER === Metronic::getComponent()->sidebarMenu) {
            Html::addCssClass($this->options, 'page-sidebar-menu-hover-submenu');
        }

        if (Metronic::SIDEBAR_STYLE_LIGHT === Metronic::getComponent()->sidebarStyle) {
            Html::addCssClass($this->options, 'page-sidebar-menu-light');
        }

        $defaultOptions = [
            'data-auto-speed'    => 200,
            'data-slide-speed'   => 200,
            'data-auto-scroll'   => 'true',
            'data-keep-expanded' => 'false',
            'style'              => 'padding-top: 20px'
        ];

        $this->options              = ArrayHelper::merge($defaultOptions, $this->options);
        $this->itemOptions['class'] = 'nav-item';
    }
}
