<?php

namespace haqqi\metronic\forms;

use yii\helpers\Html;

class ForgotPasswordForm extends \haqqi\metronic\base\ForgotPasswordForm
{
    public $loginUrl;

    public $logoTargetUrl;
    public $logoImageUrl;

    public $message = '';

    public function __construct(array $config = [])
    {
        $this->logoTargetUrl = \Yii::$app->homeUrl;
        $this->loginUrl      = \Yii::$app->urlManager->createUrl(\Yii::$app->user->loginUrl);

        $this->message = Html::tag('p', 'Enter your e-mail address below to reset your password.');
        parent::__construct($config);
    }
}
