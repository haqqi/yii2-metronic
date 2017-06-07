<?php

namespace haqqi\metronic\base;

use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class ResetPasswordForm
 *
 * @author Haqqi <me@haqqi.net>
 * @package haqqi\metronic\base
 * 
 * @property ActiveRecord $user
 * @property string $password
 */
class ResetPasswordForm extends Model
{
    public $password;

    /** @var IdentityInterface|ActiveRecord */
    protected $_user;

    public function init()
    {
        parent::init();

        if (!$this->_user) {
            throw new InvalidConfigException('Please set the $user');
        }
    }

    public function rules()
    {
        return [
            [['passwordResetToken', 'password'], 'required'],
            [['passwordResetToken', 'password'], 'trim'],
        ];
    }

    /**
     * @param ActiveRecord|IdentityInterface $user
     */
    public function setUser($user)
    {
        $this->_user = $user;
    }

    public function resetPassword()
    {
        $this->_user->password = $this->password;

        return $this->_user->save();
    }
}
