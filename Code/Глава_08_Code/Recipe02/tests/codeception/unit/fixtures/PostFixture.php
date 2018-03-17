<?php

namespace app\tests\codeception\unit\fixtures;

use yii\test\ActiveFixture;

class PostFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Post';
    public $dataFile = '@tests/codeception/unit/fixtures/data/post.php';
}