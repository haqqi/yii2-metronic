<?php

namespace haqqi\metronic\assets\core;

use haqqi\metronic\Metronic;
use yii\web\AssetBundle;

class VersionAsset extends AssetBundle
{
    public $css = [
        'css/layout.min.css'
    ];
    
    public $js = [
        'scripts/layout.min.js'
    ];
    
    public function __construct(array $config = [])
    {
        $metronic = Metronic::getComponent();
        
        $this->sourcePath = $metronic->getAssetPath() . '/layouts/' . $metronic->version;
        
        $this->css[] = 'css/themes/' . $metronic->theme . '.min.css';
        
        parent::__construct($config);
    }
    
    public static function noPublish() {
        \Yii::$container->setDefinitions([
            self::className() => [
                'css' => [],
                'js' => []
            ]
        ]);
    }
}
