<?php

namespace haqqi\metronic;

use yii\base\Component;
use yii\base\InvalidConfigException;

class Metronic extends Component
{
    /** @var string Final component name to be used in the application */
    public static $componentName = 'metronic';

    /** @var string Version of this extension */
    public static $version = '1.0';

    /** @var string Version of Remark admin template used in this current extension version */
    public static $metronicVersion = '4.7.5';

    ////////////////////////////////////////////
    ////// Constant area ///////////////////////
    ////////////////////////////////////////////

    const LAYOUT_1 = 'layout';
    const LAYOUT_2 = 'layout2';
    const LAYOUT_3 = 'layout3';
    const LAYOUT_4 = 'layout4';
    const LAYOUT_5 = 'layout5';
    const LAYOUT_6 = 'layout6';
    const LAYOUT_7 = 'layout7';

    ////////////////////////////////////////////
    ///// Template variable area ///////////////
    ////////////////////////////////////////////

    /** @var string $assetSourcePath Location of the Metronic admin template asset. */
    public $assetSourcePath;

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
}