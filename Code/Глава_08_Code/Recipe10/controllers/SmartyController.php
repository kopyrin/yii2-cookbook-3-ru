<?php

namespace app\controllers;

use yii\web\Controller;

class SmartyController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index.tpl', [
            'name' => 'Bond',
        ]);
    }
}