<?php

namespace haqqi\metronic\forms;

use haqqi\metronic\assets\core\PageLevelAsset;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class LoginForm extends \haqqi\metronic\base\LoginForm
{
    public $rememberMeEnable = true;

    public $registerEnable = true;
    public $registerUrl    = ['metronic/auth/register'];

    public $forgotPasswordEnable = true;
    public $forgotPasswordUrl    = ['metronic/auth/forgot-password'];

    public $socialMediaLoginEnable = true;
    public $socialMediaLoginUrl    = [
        'facebook'   => ['metronic/auth/social/facebook'],
        'twitter'    => ['metronic/auth/social/twitter'],
        'googleplus' => ['metronic/auth/social/googleplus'],
        'linkedin'   => ['metronic/auth/social/linkedin'],
    ];
    
    public $logoTargetUrl;
    public $logoImageUrl;
    public $loginWith;

    public function __construct(array $config = [])
    {
        $this->logoTargetUrl = \Yii::$app->homeUrl;
        
        parent::__construct($config);
    }

    public function init()
    {
        if (is_null($this->loginWith)) {
            $this->loginWith = self::WITH_EMAIL;
        }

        if (!in_array($this->loginWith, [self::WITH_EMAIL, self::WITH_USERNAME])) {
            throw new InvalidConfigException("Invalid loginWith");
        }

        $this->scenario = $this->loginWith;
    }
}
