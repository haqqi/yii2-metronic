<?php

namespace haqqi\metronic\assets\core;

use haqqi\metronic\base\assets\GlobalAssetBundle;

class AppJsAsset extends GlobalAssetBundle
{
    public $depends = [
        'haqqi\metronic\assets\core\ComponentAsset',
    ];
    
    public $js = [
        'scripts/app.min.js'
    ];
}
