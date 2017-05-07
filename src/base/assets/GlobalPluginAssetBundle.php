<?php

namespace haqqi\metronic\base\assets;

use haqqi\metronic\Metronic;
use yii\web\AssetBundle;

class GlobalPluginAssetBundle extends AssetBundle
{
    public function __construct(array $config = [])
    {
        $this->sourcePath = \Yii::$app->get(Metronic::$componentName)->getAssetPath() . '/global/plugins';
        
        parent::__construct($config);
    }

    public function init()
    {
        parent::init();

        $this->publishOptions['except'] = ['*/'];
        $this->publishOptions['only'] = array_merge($this->css, $this->js);
    }
}
