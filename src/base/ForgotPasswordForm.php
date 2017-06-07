<?php

namespace haqqi\metronic\base;

use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class ForgotPasswordForm extends Model
{
    public $email;

    /** @var IdentityInterface */
    protected $_user;

    /** @var string */
    protected $_userClass = null;

    public function init()
    {
        parent::init();
        
        if (is_null($this->_userClass)) {
            throw new InvalidConfigException('Please set the $userClass first before doing any login process.');
        }
    }

    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'trim'],
            [['email'], 'email'],
            [
                'email',
                'exist',
                'targetClass' => $this->_userClass,
                'message'     => 'Email / user does not exist'
            ],
        ];
    }

    public function setUserClass($userClass)
    {
        $this->_userClass = $userClass;
    }

    public function getUser()
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
