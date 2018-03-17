<?php

namespace book\cart\tests;

use book\cart\Cart;
use book\cart\tests\storage\FakeStorage;

class CartTest extends TestCase
{
    /**
     * @var Cart
     */
    private $cart;

    public function setUp()
    {
        parent::setUp();
        $this->cart = new Cart(['storage' => new FakeStorage()]);
    }

    public function testEmpty()
    {
        $this->assertEquals([], $this->cart->getItems());
        $this->assertEquals(0, $this->cart->getCount());
        $this->assertEquals(0, $this->cart->getAmount());
    }

    public function testAdd()
    {
        $this->cart->add(5, 3);
        $this->assertEquals([5 => 3], $this->cart->getItems());

        $this->cart->add(7, 14);
        $this->assertEquals([5 => 3, 7 => 14], $this->cart->getItems());

        $this->cart->add(5, 10);
        $this->assertEquals([5 => 13, 7 => 14], $this->cart->getItems());
    }

    public function testSet()
    {
        $this->cart->add(5, 3);
        $this->cart->add(7, 14);
        $this->cart->set(5, 12);
        $this->assertEquals([5 => 12, 7 => 14], $this->cart->getItems());
    }

    public function testRemove()
    {
        $this->cart->add(5, 3);
        $this->cart->remove(5);
        $this->assertEquals([], $this->cart->getItems());
    }

    public function testClear()
    {
        $this->cart->add(5, 3);
        $this->cart->add(7, 14);
        $this->cart->clear();
        $this->assertEquals([], $this->cart->getItems());
    }

    public function testCount()
    {
        $this->cart->add(5, 3);
        $this->assertEquals(1, $this->cart->getCount());

        $this->cart->add(7, 14);
        $this->assertEquals(2, $this->cart->getCount());
    }

    public function testAmount()
    {
        $this->cart->add(5, 3);
        $this->assertEquals(3, $this->cart->getAmount());

        $this->cart->add(7, 14);
        $this->assertEquals(17, $this->cart->getAmount());
    }

    public function testEmptyStorage()
    {
        $cart = new Cart();
        $this->setExpectedException('yii\base\InvalidConfigException');
        $cart->getItems();
    }
} 