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

        $this->_initOptions();
    }

    public function run()
    {
        echo Html::beginTag('li', $this->parentOptions);

        echo $this->renderItem($this->parentItem);

        echo Html::endTag('li');
    }

    private function _initOptions()
    {
        $this->parentOptions['class'] = 'classic-menu-dropdown';
        // normalize the options if it has items
        if (!empty($this->items)) {
            $this->parentOptions['aria-haspopup'] = 'true';
            $this->parentItem['href']             = '#';
            $this->parentItem['label'] .= FA::icon('angle-down');
        }
        $this->parentItem['options'] = ArrayHelper::getValue($this->parentItem, 'options', []);
        $this->parentItem['options'] = ArrayHelper::merge($this->parentItem['options'], [
            'data-hover'        => 'megamenu-dropdown',
            'data-close-others' => 'true'
        ]);
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
