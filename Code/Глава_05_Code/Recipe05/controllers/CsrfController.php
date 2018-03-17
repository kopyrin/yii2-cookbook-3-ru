<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\web\Controller;

/**
 * Class CsrfController.
 * @package app\controllers
 */
class CsrfController extends Controller
{
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
}