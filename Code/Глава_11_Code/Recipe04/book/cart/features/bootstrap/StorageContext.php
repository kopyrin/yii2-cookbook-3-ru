<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use book\cart\Cart;
use book\cart\features\bootstrap\storage\FakeStorage;
use book\cart\storage\SessionStorage;
use yii\di\Container;
use yii\web\Application;

require_once __DIR__ . '/bootstrap.php';

class StorageContext implements SnippetAcceptingContext
{
    /**
     * @var SessionStorage
     * */
    private $storage;

    /**
     * @Given there is a clean storage
     */
    public function thereIsACleanStorage()
    {
        $this->mockApplication();
        $this->storage = new SessionStorage(['key' => 'test']);
    }

    /**
     * @When I save :pieces pieces of :product product to the storage
     */
    public function iSavePiecesOfProductToTheStorage($pieces, $product)
    {
        $this->storage->save([$product => $pieces]);
    }

    /**
     * @Then I should have empty storage
     */
    public function iShouldHaveEmptyStorage()
    {
        PHPUnit_Framework_Assert::assertCount(
            0,
            $this->storage->load()
        );
    }

    /**
     * @Then I should have :peaces peaces of :product product in the storage
     */
    public function iShouldHavePeacesOfProductInTheStorage($pieces, $product)
    {
        PHPUnit_Framework_Assert::assertArraySubset(
            [intval($product) => intval($pieces)],
            $this->storage->load()
        );
    }

    private function mockApplication()
    {
        Yii::$container = new Container();
        new Application([
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => __DIR__ . '/../../vendor',
        ]);
    }
}