<?php

namespace book\cart\tests;

use yii\di\Container;
use yii\console\Application;
use mageekguy\atoum\test;

/**
 * @property TestCase $then
 * @method TestCase given()
 * @method TestCase and()
 * @method TestCase array()
 * @method TestCase integer()
 * @method TestCase isEqualTo()
 * @method TestCase exception()
 */
abstract class TestCase extends test
{
    public function beforeTestMethod($method)
    {
        parent::beforeTestMethod($method);
        $this->mockApplication();
    }

    public function afterTestMethod($method)
    {
        $this->destroyApplication();
        parent::afterTestMethod($method);
    }

    protected function mockApplication()
    {
        new Application([
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => dirname(__DIR__) . '/vendor',
            'components' => [
                'session' => [
                    'class' => 'yii\web\Session',
                ],
            ]
        ]);
    }

    protected function destroyApplication()
    {
        \Yii::$app = null;
        \Yii::$container = new Container();
    }
}