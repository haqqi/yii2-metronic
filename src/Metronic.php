<?php

namespace haqqi\metronic;

use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;

class Metronic extends Component
{
    /** @var string Final component name to be used in the application */
    public static $componentName = 'metronic';

    /** @var string Version of this extension */
    public static $componentVersion = '1.0';

    /** @var string Version of Remark admin template used in this current extension version */
    public static $metronicVersion = '4.7.5';

    ////////////////////////////////////////////
    ////// Constant area ///////////////////////
    ////////////////////////////////////////////

    /** Layout Version */
    const VERSION_1 = 'layout';
    const VERSION_2 = 'layout2';
    const VERSION_3 = 'layout3';
    const VERSION_4 = 'layout4';
    const VERSION_5 = 'layout5';
    const VERSION_6 = 'layout6';
    const VERSION_7 = 'layout7';

    /** Theme */
    const THEME_BLUE      = 'blue';
    const THEME_DARK_BLUE = 'darkblue';
    const THEME_DEFAULT   = 'default';
    const THEME_GREY      = 'grey';
    const THEME_LIGHT     = 'light';
    const THEME_LIGHT_2   = 'light2';

    /** Style */
    const STYLE_SQUARE   = 'default';
    const STYLE_ROUNDED  = 'rounded';
    const STYLE_MATERIAL = 'material';

    /** Layout */
    const LAYOUT_FLUID = 'default';
    const LAYOUT_BOXED = 'boxed';

    /** Header */
    const HEADER_DEFAULT = 'default';
    const HEADER_FIXED   = 'fixed';

    /** Sidebar position */
    const SIDEBAR_POSITION_LEFT  = 'left';
    const SIDEBAR_POSITION_RIGHT = 'right';

    /** Sidebar */
    const SIDEBAR_DEFAULT = 'default';
    const SIDEBAR_FIXED   = 'fixed';

    /** Footer */
    const FOOTER_DEFAULT = 'default';
    const FOOTER_FIXED   = 'fixed';

    ////////////////////////////////////////////
    ///// Template variable area ///////////////
    ////////////////////////////////////////////

    /** @var string $assetSourcePath Location of the Metronic admin template asset. */
    public $assetSourcePath;

    /** @var string Asset bundle class to be registered in the layout. Customizable via configuration. This class must depends on MetronicAsset. The default will be MetronicAsset itself. */
    public $assetBundleClass;

    public $version = self::VERSION_1;

    public $style = self::STYLE_SQUARE;

    public $theme = self::THEME_DARK_BLUE;

    public $layoutOption = self::LAYOUT_FLUID;

    public $headerOption = self::HEADER_DEFAULT;

    public $sidebarPosition = self::SIDEBAR_POSITION_LEFT;

    public $sidebarOption = self::SIDEBAR_DEFAULT;

    public $footerOption = self::FOOTER_DEFAULT;

    /**
     * @return null|Metronic|object
     * @throws InvalidConfigException
     */
    public static function getComponent()
    {
        try {
            return \Yii::$app->get(self::$componentName);
        } catch (InvalidConfigException $e) {
            throw new InvalidConfigException('Component name should be set and named "' . self::$componentName . '".');
        }
    }

    public function getAssetPath()
    {
        return $this->assetSourcePath . '/theme/assets';
    }

    public function registerAsset($view)
    {
        if ($this->assetSourcePath === null) {
            throw new InvalidConfigException('Please set $assetSourcePath of remark admin template');
        }
        if ($this->assetBundleClass === null) {
            throw new InvalidConfigException('Please set $assetBundleClass property.');
        }
        /** @var AssetBundle $assetBundleClass */
        $assetBundleClass = $this->assetBundleClass;
        $assetBundleClass::register($view);
    }
}