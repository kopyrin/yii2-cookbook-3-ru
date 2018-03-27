<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\Controller;

/**
 * Class SiteController.
 * @package app\controllers
 */
class XssController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $username = Yii::$app->request->get('username', 'nobody');

        $content = Html::tag('h1', 'Hello, ' . $username . '!');

        return $this->renderContent(
            HtmlPurifier::process($content)
        );
    }
}