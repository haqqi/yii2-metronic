<?php

namespace haqqi\metronic\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Portlet extends Widget
{
    const TYPE_BOXED          = 'boxed';
    const TYPE_LIGHT          = 'light';
    const TYPE_LIGHT_BORDERED = 'lightBordered';
    const TYPE_SOLID          = 'solid';

    public $type = self::TYPE_LIGHT_BORDERED;

    /** @var array Portlet container options for the html */
    public $options = [];

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
        echo Html::beginTag('section', $this->options);
//        $this->_renderHeader();
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
        echo Html::endTag('section');
    }

    protected function _initOptions()
    {
        $defaultOptions = [
            'class' => [
                'portlet'
            ]
        ];
        if ($this->type === self::TYPE_BOXED) {
            $defaultOptions['class'][] = 'box';
        } elseif($this->type === self::TYPE_SOLID)  {
            $defaultOptions['class'][] = 'solid';
        } elseif($this->type === self::TYPE_LIGHT_BORDERED) {
            $defaultOptions['class'][] = 'light';
            $defaultOptions['class'][] = 'bordered';
        } else {
            $defaultOptions['class'][] = 'light';
        }
        $this->options = ArrayHelper::merge($defaultOptions, $this->options);

        // scroller options
        $defaultScrollerOptions = [
            'class' => ['scroller'],
            'style' => 'height: 200px;'
        ];
        $this->scrollerOptions  = ArrayHelper::merge($defaultScrollerOptions, $this->scrollerOptions);
    }
}