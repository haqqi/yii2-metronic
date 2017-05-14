<?php

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

return [
    [
        'label' => 'Dashboard',
        'icon'  => Html::tag('i', '', ['class' => 'icon-home']),
//        'badge' => '<span class="badge badge-important">3</span>',
        'url'   => ['/metronic/dashboard/index']
    ],
    [
        'label' => 'General'
    ],
    [
        'label' => 'Dashboard Style',
        'icon' => FA::icon('diamond'),
        'badge' => '<span class="badge badge-important">3</span>',
        'items' => [
            [
                'label' => 'Dashboard v1',
                'url'   => ['/metronic/dashboard/v1'],
                'badge' => '<span class="badge bg-blue-steel">32</span>',
            ],
            [
                'label' => 'Dashboard v2',
                'url'   => ['/metronic/dashboard/v2'],
            ],
            [
                'label' => 'Ecommerce',
                'url'   => ['/metronic/dashboard/ecommerce'],
            ],
            [
                'label' => 'Analytics',
                'url'   => ['/metronic/dashboard/analytics'],
            ],
            [
                'label' => 'Team',
                'url'   => ['/metronic/dashboard/team'],
            ],
        ]
    ],
];
