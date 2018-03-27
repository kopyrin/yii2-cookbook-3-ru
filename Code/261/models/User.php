<?php

namespace app\models;

class User extends \yii\base\Object implements  \yii\web\IdentityInterface, \yii\filters\RateLimitInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    CONST RATE_LIMIT_NUMBER = 5;
    CONST RATE_LIMIT_RESET = 60;

    // 5 requests per one minute
    public function getRateLimit($request, $action) {
        return [self::RATE_LIMIT_NUMBER, self::RATE_LIMIT_RESET];
    }

    public function loadAllowance($request, $action) {
        $userAllowance = UserAllowance::findOne($this->id);
        return $userAllowance ?
            [$userAllowance->allowed_number_requests, $userAllowance->last_check_time] :
             $this->getRateLimit($request, $action);
    }

    public function saveAllowance($request, $action, $allowance, $timestamp) {
        $userAllowance = ($allowanceModel = UserAllowance::findOne($this->id)) ? $allowanceModel : new UserAllowance();
        $userAllowance->user_id = $this->id;
        $userAllowance->last_check_time = $timestamp;
        $userAllowance->allowed_number_requests = $allowance;
        $userAllowance->save();
    }

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
