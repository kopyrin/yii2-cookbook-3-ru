<?php

namespace app\controllers;

use app\models\Article;
use yii\helpers\Html;
use yii\web\Controller;

class ModelValidationController extends Controller
{
    private function getLongTitle()
    {
        return 'There is a very long content for current article, '
               .'it should be less then ten words';
    }

    private function getShortTitle()
    {
        return 'There is a shot title';
    }

    private function renderContentByModel($title)
    {
        $model = new Article();
        $model->title = $title;

        if ($model->validate()) {
            $content = Html::tag('div', 'Model is valid.', [
                'class' => 'alert alert-success',
            ]);
        } else {
            $content = Html::errorSummary($model, [
                'class' => 'alert alert-danger',
            ]);
        }

        return $this->renderContent($content);
    }

    public function actionSuccess()
    {
        $title = $this->getShortTitle();

        return $this->renderContentByModel($title);
    }

    public function actionFailure()
    {
        $title = $this->getLongTitle();

        return $this->renderContentByModel($title);
    }
}
