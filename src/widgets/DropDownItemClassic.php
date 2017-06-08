<?php

namespace haqqi\metronic\widgets;

use rmrevin\yii\fontawesome\FA;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Menu;

class DropDownItemClassic extends Menu
{
    public $parentItem    = [];
    public $parentOptions = [];

    public $linkTemplate    = '<a {attr}>{icon}{label}{badge}</a>';
    public $submenuTemplate = "\n<ul class='dropdown-menu'>\n{items}\n</ul>\n";

    public function init()
    {
        parent::init();

        if (empty($this->parentItem)) {
            throw new InvalidConfigException('$parentItem must be set.');
        }

        if ($this->route === null && \Yii::$app->controller !== null) {
            $this->route = \Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = \Yii::$app->request->getQueryParams();
        }
        $this->items = $this->normalizeItems($this->items, $hasActiveChild);

        $this->_initOptions();
    }

    public function run()
    {
        echo Html::beginTag('li', $this->parentOptions);

        echo $this->renderItem($this->parentItem);

        if (!empty($this->items)) {
            $options = $this->options;
            $tag = ArrayHelper::remove($options, 'tag', 'ul');

            echo Html::tag($tag, $this->renderItems($this->items), $options);
        }

        echo Html::endTag('li');
    }

    private function _initOptions()
    {
        $this->parentOptions['class'] = 'classic-menu-dropdown';
        // normalize the options if it has items
        if (!empty($this->items)) {
            $this->parentOptions['aria-haspopup'] = 'true';
            $this->parentItem['href']             = '#';
            $this->parentItem['label']            .= ' ' . FA::icon('angle-down');
        }
        $this->parentItem['options'] = ArrayHelper::getValue($this->parentItem, 'options', []);
        $this->parentItem['options'] = ArrayHelper::merge($this->parentItem['options'], [
            'data-hover'        => 'megamenu-dropdown',
            'data-close-others' => 'true'
        ]);
        
        // dropdown menu options
        $defaultOptions = [
            'class' => 'dropdown-menu'
        ];

        $this->options              = ArrayHelper::merge($defaultOptions, $this->options);
    }

    /**
     * Recursively renders the menu items (without the container tag).
     * @param array $items the menu items to be rendered recursively
     * @return string the rendering result
     */
    protected function renderItems($items)
    {
        $n = count($items);
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $class = [];
            if ($item['active']) {
                $class[] = $this->activeCssClass;
            }
            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
                $class[] = $this->lastItemCssClass;
            }

            // add class if the item has subs
            if (!empty($item['items'])) {
                $class[] = 'dropdown-submenu';
            }
            
            Html::addCssClass($options, $class);

            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $submenuTemplate = ArrayHelper::getValue($item, 'submenuTemplate', $this->submenuTemplate);
                $menu .= strtr($submenuTemplate, [
                    '{items}' => $this->renderItems($item['items']),
                ]);
            }
            $lines[] = Html::tag($tag, $menu, $options);
        }

        return implode("\n", $lines);
    }

    protected function renderItem($item)
    {
        return strtr(ArrayHelper::getValue($item, 'template', $this->linkTemplate), [
            '{attr}'  => $this->_formatItemAttr($item),
            '{icon}'  => $this->_formatItemIcon($item),
            '{label}' => $this->_formatItemLabel($item),
            '{badge}' => $this->_formatItemBadge($item),
        ]);
    }

    /**
     * Format out item url
     * @param array $item given item
     * @return string item url
     */
    private function _formatItemAttr($item)
    {
        $options = [
            'href' => ArrayHelper::getValue($item, 'url', '#')
        ];

        if (!empty($item['items']) || $options['href'] == '#') {
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
        return ArrayHelper::getValue($item, 'label', '');
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

    /**
     * Pulls out item badge
     * @param array $item given item
     * @return string item badge
     */
    private function _formatItemBadge($item)
    {
        return ArrayHelper::getValue($item, 'badge', ' ');
    }
}
