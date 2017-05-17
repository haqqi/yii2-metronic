<?php

namespace haqqi\metronic;

use haqqi\metronic\assets\core\PageLevelAsset;
use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        // run this if only the remark component is loaded / defined
        if ($app->has(Metronic::$componentName)) {
            // setup default params for remark template
            $app->params = ArrayHelper::merge(require(__DIR__ . '/config/params.php'), \Yii::$app->params);

            $app->assetManager->bundles[PageLevelAsset::className()] = ArrayHelper::merge([
                'addons' => [
                    'metronic/auth/login-v1' => [
                        'css' => [
                            'css/login.min.css'
                        ]
                    ]
                ]
            ], $app->assetManager->bundles[PageLevelAsset::className()]);

            // override the definitions if any
            \Yii::$container->setDefinitions(require(__DIR__ . '/config/components.php'));
        } else {
            \Yii::info('Component ' . Metronic::$componentName . ' is not loaded. No need to set the definitions.');
        }
    }
}
