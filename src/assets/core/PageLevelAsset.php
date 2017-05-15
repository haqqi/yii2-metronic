<?php

namespace haqqi\metronic\assets\core;

use haqqi\metronic\Metronic;
use yii\web\AssetBundle;

class PageLevelAsset extends AssetBundle
{
    public $css = [];
    
    public $js = [];
    
    public function __construct(array $config = [])
    {
        $this->sourcePath = Metronic::getComponent()->getAssetPath() . '/pages';
        
        parent::__construct($config);
    }
    
    public static function login() {
        \Yii::$container->setDefinitions([
            self::className() => [
                'css' => [
                    'css/login.min.css'
                ],
                'js' => []
            ]
        ]);
    }
}
