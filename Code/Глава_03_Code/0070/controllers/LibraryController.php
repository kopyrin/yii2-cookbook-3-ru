<?php

namespace app\controllers;

use yii\base\Controller;

class LibraryController extends Controller
{
    public function actionIndex()
    {
        $awesome = new \awesome\namespaced\Library();
        echo '<pre>' . $awesome->method() . '</pre>';

        $old = new \OldLibrary();
        echo '<pre>' . $old->method() . '</pre>';

        echo '<pre>' . simpleFunction() . '</pre>';
    }
}