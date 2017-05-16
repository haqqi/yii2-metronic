<?php

namespace haqqi\metronic\forms;

use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class LoginForm extends Model
{
    const SCENARIO_SUBMIT_LOGIN = 'submitLogin';

    public $email;
    public $password;
    public $rememberMe;

    public $rememberMeEnable = true;

    public $registerEnable = true;
    public $registerUrl    = ['metronic/auth/register'];

    public $forgotPasswordEnable = true;
    public $forgotPasswordUrl    = ['metronic/auth/forgot-password'];

    public $socialMediaLoginEnable = true;
    public $socialMediaLoginUrl    = [
        'facebook' => 'metronic/auth/social/facebook',
        'twitter'  => 'metronic/auth/social/twitter',
        'gplus'    => 'metronic/auth/social/gplus',
        'linkedin' => 'metronic/auth/social/linkedin',
    ];

    /** @var IdentityInterface */
    protected $_user;

    /** @var string */
    protected $_userClass;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['email', 'password'], 'trim'],
            ['email', 'email'],
            ['email', 'exist', 'targetClass' => $this->_userClass, 'message' => 'Email / user does not exist'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!method_exists($this->getUser(), 'validatePassword')) {
                throw new InvalidConfigException('User must have method validatePassword($password).');
            }

            if (!$this->getUser()->validatePassword($this->{$attribute})) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    public function scenarios()
    {
        $scenarios                              = parent::scenarios();
        $scenarios[self::SCENARIO_SUBMIT_LOGIN] = ['email', 'password', 'rememberMe'];
        return $scenarios;
    }

    public function setUserClass($userClass)
    {
        $this->_userClass = $userClass;
    }

    public function login()
    {
        if ($this->validate()) {
            return \Yii::$app->user->login($this->getUser(),
                $this->rememberMe ? \Yii::$app->params['user.rememberMeDuration'] : 0);
        }
        return false;
    }

    /**
     * @return IdentityInterface
     * @throws InvalidConfigException
     */
    protected function getUser()
    {
        if ($this->_userClass === null || !class_exists($this->_userClass)) {
            throw new InvalidConfigException('Please set the $userClass first before doing any login process.');
        }

        if ($this->_user === null) {
            /** @var ActiveRecord|IdentityInterface $class */
            $class = $this->_userClass;

            $this->_user = $class::findOne(['email' => $this->email]);
        }

        return $this->_user;
    }
}