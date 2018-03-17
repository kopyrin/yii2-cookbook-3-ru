<?php

namespace app\controllers;

use app\filters\AgreementFilter;
use app\models\AgreementForm;
use app\services\AgreementChecker;
use Yii;
use yii\web\Controller;

class ContentController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => AgreementFilter::className(),
                'only' => ['index'],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAgreement()
    {
        $model = new AgreementForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $checker = new AgreementChecker();
            $checker->allowAccess();
            return $this->redirect(['index']);
        } else {
            return $this->render('agreement', [
                'model' => $model,
            ]);
        }
    }
}