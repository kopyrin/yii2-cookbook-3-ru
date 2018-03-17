<?php

namespace book\cart\tests\storage;

use book\cart\storage\StorageInterface;

class FakeStorage implements StorageInterface
{
    private $items = [];

    public function load()
    {
        return $this->items;
    }

    public function save(array $items)
    {
        $this->items = $items;
    }
}