<?php

namespace haqqi\metronic\assets\plugins;

use yii\web\AssetBundle;

class DateRangePickerAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap-daterangepicker';

    public $depends = [
        'haqqi\metronic\assets\plugins\MomentJsAsset'
    ];

    public $css = [
        'daterangepicker.css'
    ];

    public $js = [
        'daterangepicker.js'
    ];
    
    public $publishOptions = [
        'only' => [
            '/daterangepicker.css',
            '/daterangepicker.js'
        ]
    ];
}
