<?php

namespace app\controllers;

use yii\web\Controller;

class MaintenanceController extends Controller
{
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }
} 