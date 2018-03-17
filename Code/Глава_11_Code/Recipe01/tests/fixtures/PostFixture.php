<?php

namespace tests\fixtures;

use yii\test\ActiveFixture;

class PostFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Post';
    public $dataFile = '@tests/_data/post.php';
}