<?php

namespace app\components;

use Yii;
use yii\base\Component;

class ShoppingCart extends Component
{
    public $sessionKey = 'cart';

    private $_items = [];

    public function add($id, $amount)
    {
        $this->loadItems();
        if (array_key_exists($id, $this->_items)) {
            $this->_items[$id]['amount'] += $amount;
        } else {
            $this->_items[$id] = [
                'id' => $id,
                'amount' => $amount,
            ];
        }
        $this->saveItems();
    }

    public function remove($id)
    {
        $this->loadItems();
        $this->_items = array_diff_key($this->_items, [$id => []]);
        $this->saveItems();
    }

    public function clear()
    {
        $this->_items = [];
        $this->saveItems();
    }

    public function getItems()
    {
        $this->loadItems();
        return $this->_items;
    }

    private function loadItems()
    {
        $this->_items = Yii::$app->session->get($this->sessionKey, []);
    }

    private function saveItems()
    {
        Yii::$app->session->set($this->sessionKey, $this->_items);
    }
}