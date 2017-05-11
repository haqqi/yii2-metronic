<?php

namespace haqqi\metronic\assets\core;

use yii\web\AssetBundle;

class PluginAsset extends AssetBundle
{
    public $depends = [
        'haqqi\metronic\assets\plugins\JsCookieAsset',
        'haqqi\metronic\assets\plugins\SlimScrollAsset'
    ];
}