<?php

namespace haqqi\metronic\assets\core;

use haqqi\metronic\base\assets\GlobalPluginAssetBundle;
use yii\web\View;

class IEAsset extends GlobalPluginAssetBundle
{
    public $depends = [
        'mimicreative\assets\Html5ShivAsset'
    ];
    
    public $js = [
        'respond.min.js',
        'excanvas.min.js',
        'ie8.fix.min.js'
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
        'condition' => 'lte IE9',
    ];
}
