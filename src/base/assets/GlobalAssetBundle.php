<?php

namespace haqqi\metronic\base\assets;

use haqqi\metronic\Metronic;
use yii\web\AssetBundle;

class GlobalAssetBundle extends AssetBundle
{
    public $publishOptions = [
        'except' => [
            'plugins/'
        ]
    ];
    
    public function __construct(array $config = [])
    {
        $this->sourcePath = Metronic::getComponent()->getAssetPath() . '/global';
        
        parent::__construct($config);
    }
}
