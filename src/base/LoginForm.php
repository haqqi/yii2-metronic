<?php

namespace haqqi\metronic\base;

use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\web\IdentityInterface;

class LoginForm extends Model
{
    const WITH_EMAIL = 'EMAIL';
    const WITH_USERNAME = 'USERNAME';

    /** THIS WILL BE USED BY DEFAULT **/
    const SCENARIO_SUBMIT_LOGIN = 'EMAIL';

    public $email;
    public $username;
    public $password;
    public $rememberMe;

    /** @var IdentityInterface */
    protected $_user;

    /** @var string */
    protected $_userClass = null;

    public function init()
    {
        parent::init();
        if (is_null($this->_userClass)) {
            throw new InvalidConfigException("Please set user class");
        }
    }

    public function rules()
    {
        return [
            [['email', 'username', 'password'], 'required'],
            [['email', 'username'], 'trim'],
            ['email', 'email'],
            [['email', 'username'], 'exist', 'targetClass' => $this->_userClass, 'message' => 'User does not exist'],
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
        $scenarios                      = parent::scenarios();
        $scenarios[self::WITH_EMAIL]    = ['email', 'password', 'rememberMe'];
        $scenarios[self::WITH_USERNAME] = ['username', 'password', 'rememberMe'];
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

            if ($this->loginWith === self::WITH_EMAIL) {
               $this->_user = $class::findOne(['email' => $this->email]);
            } elseif ($this->loginWith === self::WITH_USERNAME) {
                $this->_user = $class::findOne(['username' => $this->username]);
            }
        }

        return $this->_user;
    }
}
