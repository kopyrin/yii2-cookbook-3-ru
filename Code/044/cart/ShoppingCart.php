<?php

namespace app\cart;

use app\cart\storage\StorageInterface;

class ShoppingCart
{
    /**
     * @var StorageInterface
     */
    private $storage;

    private $_items = [];

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

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
        $this->_items = $this->storage->load();
    }

    private function saveItems()
    {
        $this->storage->save($this->_items);
    }
}