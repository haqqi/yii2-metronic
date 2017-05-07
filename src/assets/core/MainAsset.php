<?php

namespace haqqi\metronic\assets\core;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
        'mimicreative\assets\SimpleLineIconsAsset',
    ];
    
    public $css = [
        // main fonts
        '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i',
        
    ];
}
