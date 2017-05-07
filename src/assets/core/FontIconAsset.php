<?php

namespace haqqi\metronic\assets\core;

use yii\web\AssetBundle;

class FontIconAsset extends AssetBundle
{
    public $depends = [
        'rmrevin\yii\fontawesome\AssetBundle',
        'mimicreative\assets\SimpleLineIconsAsset',
    ];
    
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i',
    ];
}