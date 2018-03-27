<?php

namespace app\controllers;

use app\models\BlogPost;
use Yii;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Class TestController
 * @package app\controllers
 */
class TestController extends Controller
{
    public function actionIndex(){

        $masterModel = new BlogPost();
        $masterModel->title = 'Awesome';
        $masterModel->text = 'Something is going on..';
        $masterModel->save();

        $postId = $masterModel->id;

        $replModel = BlogPost::findOne($postId);

        return $this->renderContent(
            Html::tag('h2', 'Master') .
            Html::tag('pre', VarDumper::dumpAsString(
                $masterModel
                    ? $masterModel->attributes
                    : null
            )) .
            Html::tag('h2', 'Slave') .
            Html::tag('pre', VarDumper::dumpAsString(
                $replModel
                    ? $replModel->attributes
                    : null

            ))
        );
    }

}
