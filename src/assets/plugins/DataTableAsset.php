<?php
/**
 * User: Haqqi
 * Date: 5/17/2017
 * Time: 1:35 PM
 */

namespace haqqi\metronic\assets\plugins;

use haqqi\metronic\base\assets\PluginAssetBundle;

class DataTableAsset extends PluginAssetBundle
{
    public $pluginName = 'datatables';
    
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    
    public $css = [
        'datatables.min.css',
        'plugins/bootstrap/datatables.bootstrap.css'
    ];
    
    public $js = [
        'datatables.min.js',
        'plugins/bootstrap/datatables.bootstrap.js'
    ];
}