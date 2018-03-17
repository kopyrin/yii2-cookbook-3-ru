<?php

namespace app\controllers;

use app\models\BlogPost;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Class TestController.
 * @package app\controllers
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        $blogPost = new BlogPost();
        $blogPost->title = 'Gotcha!';
        $blogPost->text = 'We need some laughter to ease the tension of holiday shopping.';
        $blogPost->save();

        return $this->renderContent(Html::tag('pre',
            VarDumper::dumpAsString($blogPost->attributes)
        ));
    }
}
