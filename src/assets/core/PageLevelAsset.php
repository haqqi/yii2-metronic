<?php

namespace haqqi\metronic\assets\core;

use haqqi\metronic\Metronic;
use yii\web\AssetBundle;

class PageLevelAsset extends AssetBundle
{
    public $css = [];

    public $js = [];

    /**
     * @var array addons assets
     */
    public $addons = [];

    public function __construct(array $config = [])
    {
        $this->sourcePath = Metronic::getComponent()->getAssetPath() . '/pages';

        parent::__construct($config);
    }

    public function init()
    {
        parent::init();

        $this->_handleAddons();
    }

    private function _handleAddons()
    {
        $requestedRoute = \Yii::$app->requestedRoute;

        if (array_key_exists($requestedRoute, $this->addons)) {

            $additional = $this->addons[$requestedRoute];

            if (array_key_exists('depends', $additional) && is_array($additional['depends'])) {
                $this->depends = array_merge($this->css, $additional['depends']);
            }
            if (array_key_exists('js', $additional) && is_array($additional['js'])) {
                $this->js = array_merge($this->js, $additional['js']);
            }
            if (array_key_exists('css', $additional) && is_array($additional['css'])) {
                $this->css = array_merge($this->css, $additional['css']);
            }
        }
    }
}
