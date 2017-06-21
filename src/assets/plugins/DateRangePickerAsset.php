<?php

namespace haqqi\metronic\assets\plugins;

use haqqi\metronic\base\assets\PluginAssetBundle;

class DateRangePickerAsset extends PluginAssetBundle
{
    public $pluginName = 'bootstrap-daterangepicker';

    public $depends = [
        'haqqi\metronic\assets\plugins\MomentJsAsset'
    ];

    public $css = [
        'daterangepicker.min.css'
    ];

    public $js = [
        'daterangepicker.min.js'
    ];
}
