<?php

namespace app\controllers\api;

use yii\rest\ActiveController;

class PostsController extends ActiveController
{
    public $modelClass = '\app\models\Post';
} 