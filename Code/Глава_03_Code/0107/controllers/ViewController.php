<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * Class ViewController.
 */
class ViewController extends Controller
{
    public $pageTitle;

    public function actionIndex()
    {
        $this->pageTitle = 'Controller context test';

        return $this->render('index');
    }

    public function hello()
    {
        if (!empty($_GET['name'])) {
            echo 'Hello, '.$_GET['name'].'!';
        }
    }
}
