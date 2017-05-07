<?php

namespace haqqi\metronic\assets;

use yii\web\AssetBundle;

class MetronicAsset extends AssetBundle
{
    public $depends = [
        'haqqi\metronic\assets\core\FontIconAsset',
        'haqqi\metronic\assets\core\MainAsset',
        'haqqi\metronic\assets\core\IEAsset'
    ];
}
