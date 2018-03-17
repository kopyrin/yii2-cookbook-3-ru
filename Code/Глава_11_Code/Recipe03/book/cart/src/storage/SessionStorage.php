<?php

namespace book\cart\storage;

use Yii;

class SessionStorage implements StorageInterface
{
    public $sessionKey = 'cart';

    public function load()
    {
        return Yii::$app->session->get($this->sessionKey, []);
    }

    public function save(array $items)
    {
        Yii::$app->session->set($this->sessionKey, $items);
    }
}