<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\DeliveryForm;

class ValidationController extends Controller
{
    public function actionIndex()
    {
        $model = new DeliveryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('success',
                'The form was successfully processed!'
            );
        }

        return $this->render('index', array(
            'model' => $model,
        ));
    }
}