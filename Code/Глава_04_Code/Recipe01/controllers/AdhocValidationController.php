<?php

namespace app\controllers;

use app\components\WordsValidator;
use app\models\Article;
use yii\helpers\Html;
use yii\web\Controller;

class AdhocValidationController extends Controller
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

    private function renderContentByTitle($title)
    {
        $validator = new WordsValidator([
            'size' => 10,
        ]);

        if ($validator->validate($title, $error)) {
            $content = Html::tag('div', 'Value is valid.', [
                'class' => 'alert alert-success',
            ]);
        } else {
            $content = Html::tag('div', $error, [
                'class' => 'alert alert-danger',
            ]);
        }

        return $this->renderContent($content);
    }

    public function actionSuccess()
    {
        $title = $this->getShortTitle();

        return $this->renderContentByTitle($title);
    }

    public function actionFailure()
    {
        $title = $this->getLongTitle();

        return $this->renderContentByTitle($title);
    }
}
