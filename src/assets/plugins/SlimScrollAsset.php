<?php

namespace haqqi\metronic\assets\plugins;

use haqqi\metronic\base\assets\PluginAssetBundle;

class SlimScrollAsset extends PluginAssetBundle
{
    public $pluginName = 'jquery-slimscroll';

    public $depends = [
        'yii\web\JqueryAsset'
    ];
    
    public $js = [
        'jquery.slimscroll.min.js',
    ];
}
