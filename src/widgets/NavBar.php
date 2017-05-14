<?php

namespace haqqi\metronic\widgets;

use haqqi\metronic\assets\core\VersionAsset;
use haqqi\metronic\helpers\Layout;
use haqqi\metronic\Metronic;
use yii\base\Widget;
use yii\helpers\Html;

class NavBar extends Widget
{
    public $options = [];

    public $brandUrl;
    public $brandLogoUrl;
    public $brandLabel = 'Metronic';

    public function __construct(array $config = [])
    {
        $this->options      = Layout::getHtmlOptions('header');
        $this->brandUrl     = \Yii::$app->homeUrl;
        $this->brandLogoUrl = \Yii::$app->assetManager->getBundle(VersionAsset::className())->baseUrl . '/img/logo.png';
        $this->brandLabel   = 'Metronic';

        parent::__construct($config);
    }

    public function init()
    {
        echo Html::beginTag('div', $this->options);
        echo Html::beginTag('div', ['class' => 'page-header-inner']);

        $this->_renderPageLogo();
        
        $metronic = Metronic::getComponent();

        // render left navbar
        if($metronic->navbarLeftFile) {
            echo $this->render($metronic->navbarLeftFile);
        }
        
        $this->_renderResponsiveToggleButton();

        // render right navbar
        if($metronic->navbarRightFile) {
            echo $this->render($metronic->navbarRightFile);
        }
        
        parent::init();
    }

    public function run()
    {
        parent::run();

        echo Html::endTag('div');
        echo Html::endTag('div');
    }

    protected function _renderResponsiveToggleButton()
    {
        echo Html::a(Html::tag('span'), 'javascript:;', [
            'class'       => 'menu-toggler responsive-toggler',
            'data-toggle' => 'collapse',
            'data-target' => '.navbar-collapse'
        ]);
    }

    protected function _renderPageLogo()
    {
        echo Html::beginTag('div', ['class' => 'page-logo']);

        if ($this->brandLogoUrl) {
            $content = Html::img($this->brandLogoUrl, ['class' => 'logo-default', 'alt' => $this->brandLabel]);
        } else {
            $content = $this->brandLabel;
        }

        echo Html::a($content, $this->brandUrl);

        echo Html::tag('div', Html::tag('span'), ['class' => 'menu-toggler sidebar-toggler']);

        echo Html::endTag('div');
    }
}