<?php

namespace haqqi\metronic\assets\core;

use yii\web\AssetBundle;

class PluginAsset extends AssetBundle
{
    public $depends = [
        'haqqi\metronic\assets\core\MainAsset',
        'haqqi\metronic\assets\plugins\JsCookieAsset',
        'haqqi\metronic\assets\plugins\SlimScrollAsset',
        'haqqi\metronic\assets\plugins\JqueryBlockUiAsset',
        'haqqi\metronic\assets\plugins\BootstrapSwitchAsset',
    ];
}