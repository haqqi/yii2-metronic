<?php

use haqqi\metronic\Metronic;
use yii\web\View;

return [
    'yii\web\JqueryAsset' => [
        'sourcePath' => Yii::$app->get(Metronic::$componentName)->getAssetPath() . '/global/plugins',
        'js'         => ['jquery.min.js'],
        'jsOptions'  => ['position' => View::POS_HEAD],
        'publishOptions' => [
            'only' => [
                'jquery.min.js'
            ],
            'except' => [
                '*/'
            ]
        ]
    ],
];
