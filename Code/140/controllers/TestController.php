<?php

namespace app\controllers;

use app\models\Post;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Class TestController.
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        $post = new Post();
        $post->title = 'links test';
        $post->text = 'before http://www.yiiframework.com/ after';
        $post->save();

        return $this->renderContent(Html::tag('pre', VarDumper::dumpAsString(
            $post->attributes
        )));
    }
}
