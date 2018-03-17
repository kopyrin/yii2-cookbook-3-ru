<?php

namespace app\controllers;

use yii\web\Controller;

class BlogController extends Controller
{
    public function actionRssFeed($param)
    {
        return $this->renderContent('This is RSS feed for our blog and ' . $param);
    }

    public function actionArticle($alias)
    {
        return $this->renderContent('This is an article with alias ' . $alias);
    }

    public function actionList()
    {
        return $this->renderContent('Blog\'s articles here');
    }

    public function actionHiTech()
    {
        return $this->renderContent('Just a test of action which contains more than one words in the name');
    }
}
