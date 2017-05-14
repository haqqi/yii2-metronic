<?php

namespace haqqi\metronic\assets\plugins;

use haqqi\metronic\base\assets\PluginAssetBundle;

class BootstrapSwitchAsset extends PluginAssetBundle
{
    public $pluginName = 'bootstrap-switch';
    
    public $css = [
        'css/bootstrap-switch.min.css'
    ];
    
    public $js = [
        'js/bootstrap-switch.min.js'
    ];
}
