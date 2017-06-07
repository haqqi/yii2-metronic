<?php

namespace haqqi\metronic\forms;

class ResetPasswordForm extends \haqqi\metronic\base\ResetPasswordForm
{
    public $loginUrl;

    public $logoTargetUrl;
    public $logoImageUrl;

    public function __construct(array $config = [])
    {
        $this->logoTargetUrl = \Yii::$app->homeUrl;
        $this->loginUrl      = \Yii::$app->urlManager->createUrl(\Yii::$app->user->loginUrl);
        parent::__construct($config);
    }
}
