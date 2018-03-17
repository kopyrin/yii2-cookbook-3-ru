<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use book\cart\Cart;
use book\cart\features\bootstrap\storage\FakeStorage;
use yii\di\Container;
use yii\web\Application;

require_once __DIR__ . '/bootstrap.php';

class CartContext implements SnippetAcceptingContext
{
    /**
     * @var Cart
     * */
    private $cart;

    /**
     * @Given there is a clean cart
     */
    public function thereIsACleanCart()
    {
        $this->resetCart();
    }

    /**
     * @Given there is a cart with :pieces pieces of :product product
     */
    public function thereIsAWhichCostsPs($product, $amount)
    {
        $this->resetCart();
        $this->cart->set($product, floatval($amount));
    }

    /**
     * @When I add :pieces pieces of :product product
     */
    public function iAddTheToTheCart($product, $pieces)
    {
        $this->cart->add($product, $pieces);
    }

    /**
     * @When I set :pieces pieces for :arg2 product
     */
    public function iSetPiecesForProduct($pieces, $product)
    {
        $this->cart->set($product, $pieces);
    }

    /**
     * @When I clear cart
     */
    public function iClearCart()
    {
        $this->cart->clear();
    }

    /**
     * @Then I should have empty cart
     */
    public function iShouldHaveEmptyCart()
    {
        PHPUnit_Framework_Assert::assertEquals(
            0,
            $this->cart->getCount()
        );
    }

    /**
     * @Then I should have :count product(s)
     */
    public function iShouldHaveProductInTheCart($count)
    {
        PHPUnit_Framework_Assert::assertEquals(
            intval($count),
            $this->cart->getCount()
        );
    }

    /**
     * @Then the overall cart amount should be :amount
     */
    public function theOverallCartPriceShouldBePs($amount)
    {
        PHPUnit_Framework_Assert::assertSame(
            intval($amount),
            $this->cart->getAmount()
        );
    }

    /**
     * @Then I should have :pieces peaces of :product product
     */
    public function iShouldHavePeacesOfProduct($pieces, $product)
    {
        PHPUnit_Framework_Assert::assertArraySubset(
            [intval($product) => intval($pieces)],
            $this->cart->getItems()
        );
    }

    private function resetCart()
    {
        $this->cart = new Cart(['storage' => new FakeStorage()]);
    }
}