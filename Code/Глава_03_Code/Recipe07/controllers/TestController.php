<?php

namespace app\controllers;

use app\models\BlogPost;
use app\models\User;
use Yii;
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
        $users = new User();
        $identity = $users->findIdentity(100);

        Yii::$app->user->setIdentity($identity);

        $blogPost = new BlogPost();
        $blogPost->title = 'Very pretty title';
        $blogPost->text = 'Success is not final, failure is not fatal...';
        $blogPost->save();

        return $this->renderContent(Html::tag('pre', VarDumper::dumpAsString(
                $blogPost->attributes
        )));
    }
}
