<?php

namespace haqqi\metronic\assets\core;

use haqqi\metronic\assets\AssetAddonsTrait;
use haqqi\metronic\Metronic;
use yii\web\AssetBundle;

class PageLevelAsset extends AssetBundle
{
    use AssetAddonsTrait;
    
    public $css = [];

    public $js = [];

    public function __construct(array $config = [])
    {
        $this->sourcePath = Metronic::getComponent()->getAssetPath() . '/pages';

        parent::__construct($config);
    }
}
