<?php

namespace haqqi\metronic\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Portlet extends Widget
{
    const TYPE_BOXED = 'boxed';
    const TYPE_LIGHT = 'light';
    const TYPE_SOLID = 'solid';

    public $type = self::TYPE_LIGHT;

    /** @var array Portlet container options for the html */
    public $options = [];

    public $color;

    public $bordered;

    /** @var string iconClass to be used in the icon. The color will be determined by $color */
    public $titleIconClass;
    public $titleSubject;
    public $titleHelper;
    
    public $actions;
    public $tools;

    public $scroller        = true;
    public $scrollerOptions = [];

    /** @var string Body of the panel */
    public $body;

    public function __construct(array $config = [])
    {


        parent::__construct($config);
    }

    public function init()
    {
        parent::init();
        $this->_initOptions();


        // open panel tag
        echo Html::beginTag('div', $this->options);
        // render title
        $this->_renderTitle();
        // open body tag
        echo Html::beginTag('div', ['class' => 'portlet-body']);
        if ($this->scroller) {
            echo Html::beginTag('div', $this->scrollerOptions);
        }
    }

    public function run()
    {
        if (!empty($this->body)) {
            echo $this->body;
        }
        if ($this->scroller) {
            echo Html::endTag('div');
        }
        // close body tag
        echo Html::endTag('div');
        // close panel tag
        echo Html::endTag('div');
    }

    protected function _initOptions()
    {
        $classes = [
            'portlet'
        ];
        if ($this->type === self::TYPE_BOXED) {
            $classes[] = 'box';

            // setup color class
            if (!empty($this->color)) {
                $classes[] = $this->color;
            }
        } elseif ($this->type === self::TYPE_SOLID) {
            $classes[] = 'solid';

            // setup color class
            if (!empty($this->color)) {
                $classes[] = $this->color;
            }
        } else {
            $classes[] = 'light';
            if ($this->bordered) {
                $classes[] = 'bordered';
            }
        }

        $defaultOptions = [
            'class' => $classes
        ];
        $this->options  = ArrayHelper::merge($defaultOptions, $this->options);

        // scroller options
        $defaultScrollerOptions = [
            'class' => ['scroller'],
            'style' => 'height: 200px;'
        ];
        $this->scrollerOptions  = ArrayHelper::merge($defaultScrollerOptions, $this->scrollerOptions);
    }

    protected function _renderTitle()
    {
        echo Html::beginTag('div', [
            'class' => 'portlet-title'
        ]);

        $captionClass = [
            'caption'
        ];
        $iconClass    = [
            $this->titleIconClass
        ];
        
        // if the type is light, use complex caption
        if ($this->type == self::TYPE_LIGHT) {
            if(!empty($this->color)) {
                $captionClass[] = 'font-' . $this->color;
                $iconClass[]    = 'font-' . $this->color;
            }

            echo Html::beginTag('div', [
                'class' => $captionClass
            ]);

            if ($this->titleIconClass) {
                echo Html::tag('i', '', [
                        'class' => $iconClass
                    ]) . ' ';
            }

            if ($this->titleSubject) {
                echo Html::tag('span', $this->titleSubject, [
                        'class' => 'caption-subject bold uppercase'
                    ]) . "\n";
            }

            if ($this->titleHelper) {
                echo Html::tag('span', $this->titleHelper, [
                        'class' => 'caption-helper'
                    ]) . "\n";
            }

            echo Html::endTag('div');
        } else {
            // use simple caption
            echo Html::beginTag('div', [
                'class' => $captionClass
            ]);

            if ($this->titleIconClass) {
                echo Html::tag('i', '', [
                        'class' => $iconClass
                    ]) . ' ';
            }
            
            echo $this->titleSubject;

            echo Html::endTag('div');
        }

        if(empty($this->actions)) {
            echo Html::tag('div', $this->actions, ['class' => 'actions']);
        }
        if(empty($this->tools)) {
            echo Html::tag('div', $this->tools, ['class' => 'tools']);
        }

        echo Html::endTag('div');
    }
}