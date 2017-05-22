<?php

namespace backend\assets;

use haqqi\metronic\base\assets\PluginAssetBundle;

class BootstrapEditableAsset extends PluginAssetBundle
{
    public $pluginName = 'bootstrap-editable';

    public $css = [
        'bootstrap-editable/css/bootstrap-editable.css',
        'inputs-ext/address/address.css',
    ];

    public $js = [
        'bootstrap-editable/js/bootstrap-editable.js',
        'inputs-ext/wysihtml5/wysihtml5.js',
    ];
}
