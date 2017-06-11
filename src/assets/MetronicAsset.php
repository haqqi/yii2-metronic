<?php

namespace haqqi\metronic\assets;

use yii\web\AssetBundle;

class MetronicAsset extends AssetBundle
{
    public $sourcePath = '@haqqi/metronic/web';
    
    public $css = [
        'css/yii2-metronic.css'
    ];
    
    public $publishOptions = [
        'forceCopy' => (YII_ENV == YII_ENV_DEV)
    ];
    
    public $depends = [
        'haqqi\metronic\assets\core\FontIconAsset',
        'haqqi\metronic\assets\core\MainAsset',
        'haqqi\metronic\assets\core\PluginAsset',
        'haqqi\metronic\assets\core\CustomPluginAsset',
        'haqqi\metronic\assets\core\ComponentAsset',
        'haqqi\metronic\assets\core\AppJsAsset',
        'haqqi\metronic\assets\core\VersionAsset',
        'haqqi\metronic\assets\core\GlobalAppAsset',
        'haqqi\metronic\assets\core\PageLevelAsset',
        'haqqi\metronic\assets\core\IEAsset'
    ];
}
