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

    'yii\bootstrap\BootstrapAsset' => [
        'css' => [
            'css/bootstrap.min.css'
        ]
    ],
    
    'yii\bootstrap\BootstrapPluginAsset' => [
        'js'        => [
            'js/bootstrap.min.js'
        ],
        'jsOptions' => [
            'position' => View::POS_HEAD
        ],
    ]
];
