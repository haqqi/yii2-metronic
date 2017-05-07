<?php

namespace haqqi\metronic\base\assets;

use haqqi\metronic\Metronic;
use yii\web\AssetBundle;

class GlobalPluginAssetBundle extends AssetBundle
{
    public $publishOptions = [
        'except' => [
            '*/'
        ]
    ];
    
    public function __construct(array $config = [])
    {
        $this->sourcePath = \Yii::$app->get(Metronic::$componentName)->getAssetPath() . '/global/plugins';
        
        parent::__construct($config);
    }
}
