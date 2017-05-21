<?php

namespace haqqi\metronic\assets\plugins;

use haqqi\metronic\base\assets\PluginAssetBundle;

class Select2Asset extends PluginAssetBundle
{
    public $pluginName = 'select2';

    public $css = [
        'css/select2.min.css',
        'css/select2-bootstrap.min.css',
    ];

    public $js = [
        'js/select2.full.min.js',
    ];
}