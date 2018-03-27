<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\web\Controller;

class ValidationController extends Controller
{
    public function actionIndex()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('success', 'Model is valid');
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
