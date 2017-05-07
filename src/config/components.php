<?php

use haqqi\metronic\base\assets\GlobalPluginAssetBundle;
use yii\web\View;

return [
    'yii\web\JqueryAsset' => [
        'class'     => GlobalPluginAssetBundle::className(),
        'js'        => [
            'jquery.min.js'
        ],
        'jsOptions' => [
            'position' => View::POS_HEAD
        ],
    ],
];
