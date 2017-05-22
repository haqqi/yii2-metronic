<?php

namespace haqqi\metronic\assets\core;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $depends = [
        'haqqi\metronic\assets\core\FontIconAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
