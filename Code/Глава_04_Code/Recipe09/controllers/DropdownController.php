<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use app\models\SubCategory;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\HttpException;

class DropdownController extends Controller
{
    public function actionGetSubCategories($id)
    {
        if (!Yii::$app->request->isAjax) {
            throw new HttpException(400, 'Only ajax request is allowed.');
        }
        return Json::encode(Category::getSubCategories($id));
    }

    public function actionIndex()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('success',
                'Model was successfully saved'
            );
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
