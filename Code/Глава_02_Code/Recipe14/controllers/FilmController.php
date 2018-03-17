<?php

namespace app\controllers;

use app\models\Film;
use yii\web\Controller;
use yii\data\Pagination;
use yii\data\Sort;

class FilmController extends Controller
{
    public function actionIndex()
    {
        $query = Film::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->pageSize = 5;

        $sort = new Sort([
            'attributes' => [
                'title',
                'rental_rate'
            ]
        ]);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy($sort->orders)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'sort' => $sort,
            'pages' => $pages
        ]);
    }
}
