<?php

namespace haqqi\metronic\base\assets;

use haqqi\metronic\Metronic;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;

class PluginAssetBundle extends AssetBundle
{
    public $pluginName;

    public function __construct(array $config = [])
    {
        if($this->pluginName === null) {
            throw new InvalidConfigException('pluginName must be set.');
        }
        
        $this->sourcePath = Metronic::getComponent()->getAssetPath() . '/global/plugins/' . $this->pluginName;

        parent::__construct($config);
    }
}
