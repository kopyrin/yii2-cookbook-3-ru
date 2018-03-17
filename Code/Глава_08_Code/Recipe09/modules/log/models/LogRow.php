<?php

namespace app\modules\log\models;

use yii\base\Object;

class LogRow extends Object
{
    public $time;
    public $ip;
    public $userId;
    public $sessionId;
    public $level;
    public $category;
    public $text;
}