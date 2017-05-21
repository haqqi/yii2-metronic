<?php
/**
 * User: Haqqi
 * Date: 5/22/2017
 * Time: 3:04 AM
 */

namespace haqqi\metronic\assets\plugins\datatables;


use haqqi\metronic\base\assets\GlobalAssetBundle;

class DataTableGlobal extends GlobalAssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'haqqi\metronic\assets\core\PluginAsset'
    ];

    public $js = [
        'scripts/datatable.js'
    ];
}

