<?php
/**
 * User: Haqqi
 * Date: 5/17/2017
 * Time: 1:35 PM
 */

namespace haqqi\metronic\assets\plugins;


use haqqi\metronic\base\assets\GlobalAssetBundle;

class DataTableAsset extends GlobalAssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    
    public $js = [
        'scripts/datatable.min.js'
    ];
}