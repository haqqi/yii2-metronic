<?php

namespace haqqi\metronic\assets;

trait AssetAddonsTrait
{
    public $addons = [];

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
    
    private function _handleController() {
        \Yii::$container->getDefinitions();
    }
}