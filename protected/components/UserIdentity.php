<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $user = User::model()->find('LOWER(user_name)=?', array(strtolower($this->username)));
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            //save values to use anywher in application like Yii::app()->user->lastLogin;
            $this->_id = $user->user_id;
            $this->username = $user->user_name;
            $this->setState('lastLogin', date("m/d/y g:i A", strtotime($user->last_login_time)));
            $this->setState('sessionId',md5($user->last_login_time));
            $user->saveAttributes(array(
                'last_login_time' => date("Y-m-d H:i:s", time()),
            ));
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->_id;
    }
}