<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $role;

    CONST ROLE_ADMIN = 1;
    CONST ROLE_AUTHOR = 2;
    CONST ROLE_READER = 3;

    private static $users = [
        '1' => [
            'id' => '1',
            'username' => 'julia',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
            'role' => self::ROLE_ADMIN
        ],
        '2' => [
            'id' => '2',
            'username' => 'samuel',
            'password' => 'author',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
            'role' => self::ROLE_AUTHOR
        ],
        '3' => [
            'id' => '3',
            'username' => 'markus',
            'password' => 'reader',
            'authKey' => 'test102key',
            'accessToken' => '102-token',
            'role' => self::ROLE_READER
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
