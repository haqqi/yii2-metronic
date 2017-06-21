<?php

namespace haqqi\metronic\assets\plugins;

use yii\web\AssetBundle;

class MomentJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/moment';
    
    public $js = [
        'min/moment.min.js'
    ];   
    
    public $publishOptions = [
        'only' => [
            '/min/*',
            '/moment.js'
        ]
    ];
}
