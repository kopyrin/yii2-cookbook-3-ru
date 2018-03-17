<?php

namespace app\controllers;

use app\models\CartAddForm;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;

class CartController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => Yii::$app->cart->getItems(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $form = new CartAddForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            Yii::$app->cart->add($form->productId, $form->amount);
            return $this->redirect(['index']);
        }

        return $this->render('add', [
            'model' => $form,
        ]);
    }

    public function actionDelete($id)
    {
        Yii::$app->cart->remove($id);

        return $this->redirect(['index']);
    }
}