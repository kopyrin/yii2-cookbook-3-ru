<?php

namespace app\cart\storage;

use yii\web\Session;

class SessionStorage implements StorageInterface
{
    /**
     * @var Session
     */
    private $session;
    private $key;

    public function __construct(Session $session, $key)
    {
        $this->key = $key;
        $this->session = $session;
    }

    public function load()
    {
        return $this->session->get($this->key, []);
    }

    public function save(array $items)
    {
        $this->session->set($this->key, $items);
    }
}