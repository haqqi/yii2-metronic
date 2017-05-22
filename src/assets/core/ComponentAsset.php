<?php
/**
 * User: Haqqi
 * Date: 5/7/2017
 * Time: 9:11 PM
 */

namespace haqqi\metronic\assets\core;


use haqqi\metronic\base\assets\GlobalAssetBundle;
use haqqi\metronic\Metronic;
use yii\helpers\ArrayHelper;

class ComponentAsset extends GlobalAssetBundle
{
    /**
     * @var array depended bundles
     */
    public $depends = [
        'haqqi\metronic\assets\core\PluginAsset',
    ];
    /**
     * @var array css assets
     */
    public $css = [ ];
    
    /**
     * @var array style based css
     */
    private $styleBasedCss = [
        Metronic::STYLE_SQUARE => [
            'css/components.css',
            'css/plugins.css',
        ],
        Metronic::STYLE_ROUNDED => [
            'css/components-rounded.css',
            'css/plugins.css',
        ],
        Metronic::STYLE_MATERIAL => [
            'css/components-md.css',
            'css/plugins-md.css',
        ]
    ];
    /**
     * Inits bundle
     */
    public function init()
    {
        $this->_handleStyleBased();
        return parent::init();
    }
    /**
     * Handles style based files
     */
    private function _handleStyleBased()
    {
        if (Metronic::getComponent())
        {
            $css = $this->styleBasedCss[Metronic::getComponent()->style];
            $this->css = ArrayHelper::merge($css, $this->css);
        }
    }
}