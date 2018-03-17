<?php

namespace app\modules\log\controllers;

use app\modules\log\services\LogReader;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $reader = new LogReader();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $reader->getRows($this->getFile()),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    private function getFile()
    {
        return \Yii::getAlias($this->module->file);
    }
}