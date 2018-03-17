<?php

namespace book\cart;

use book\cart\storage\StorageInterface;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Cart extends Component
{
    /**
     * @var StorageInterface
     */
    private $_storage;
    /**
     * @var array
     */
    private $_items;

    public function setStorage($storage)
    {
        if (is_array($storage)) {
            $this->_storage = \Yii::createObject($storage);
        } else {
            $this->_storage = $storage;
        }
    }

    public function add($id, $amount = 1)
    {
        $this->loadItems();
        if (isset($this->_items[$id])) {
            $this->_items[$id] += $amount;
        } else {
            $this->_items[$id] = $amount;
        }
        $this->saveItems();
    }

    public function set($id, $amount)
    {
        $this->loadItems();
        $this->_items[$id] = $amount;
        $this->saveItems();
    }

    public function remove($id)
    {
        $this->loadItems();
        if (isset($this->_items[$id])) {
            unset($this->_items[$id]);
        }
        $this->saveItems();
    }

    public function clear()
    {
        $this->loadItems();
        $this->_items = [];
        $this->saveItems();
    }

    public function getItems()
    {
        $this->loadItems();
        return $this->_items;
    }

    public function getCount()
    {
        $this->loadItems();
        return count($this->_items);
    }

    public function getAmount()
    {
        $this->loadItems();
        return array_sum($this->_items);
    }

    private function loadItems()
    {
        if ($this->_storage === null) {
            throw new InvalidConfigException('Storage must be set');
        }
        if ($this->_items === null) {
            $this->_items = $this->_storage->load();
        }
    }

    private function saveItems()
    {
         $this->_storage->save($this->_items);
    }
}