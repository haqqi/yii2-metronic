<?php

namespace haqqi\metronic\assets;

use yii\helpers\ArrayHelper;

trait AssetAddonsTrait
{
    public $addons = [];

    /**
     * @var array
     *
     * Format for this variable is:
     *
     * 'classname' => [
     *      'route/one',
     *      'route/two'
     * ]
     */
    public $dependsOnRoute = [];
    public $cssOnRoute = [];
    public $jsOnRoute = [];

    public function init()
    {
        parent::init();

        $this->_handleAddons();
        $this->_handleDependsOnRoute();
        $this->_handleCssOnRoute();
        $this->_handleJsOnRoute();
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

    private function _handleDependsOnRoute()
    {
        $requestedRoute = \Yii::$app->requestedRoute;

        // loop this for each classname
        foreach ($this->dependsOnRoute as $class => $routes) {
            if (in_array($requestedRoute, $routes) && !in_array($class, $this->depends)) {
                // add to depends
                $this->depends[] = $class;
            }
        }
    }

    private function _handleCssOnRoute()
    {
        $requestedRoute = \Yii::$app->requestedRoute;

        // loop this for each classname
        foreach ($this->cssOnRoute as $css => $routes) {
            if (in_array($requestedRoute, $routes) && !in_array($css, $this->css)) {
                // add to depends
                $this->css[] = $css;
            }
        }
    }

    private function _handleJsOnRoute()
    {
        $requestedRoute = \Yii::$app->requestedRoute;

        // loop this for each classname
        foreach ($this->jsOnRoute as $js => $routes) {
            if (in_array($requestedRoute, $routes) && !in_array($js, $this->js)) {
                // add to depends
                $this->js[] = $js;
            }
        }
    }
}
