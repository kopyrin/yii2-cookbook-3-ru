<?php

namespace app\models;

use yii\base\Model;

class RangeForm extends Model
{
    public $from;
    public $to;

    public function rules()
    {
        return [
            [['from', 'to'], 'number', 'integerOnly' => true],
            ['from', 'compare', 'compareAttribute' => 'to', 'operator' => '<='],
        ];
    }
}
