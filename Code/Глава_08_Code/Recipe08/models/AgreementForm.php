<?php

namespace app\models;

use yii\base\Model;

class AgreementForm extends Model
{
    public $accept;

    public function rules()
    {
        return [
            ['accept', 'required'],
            ['accept', 'compare', 'compareValue' => 1, 'message' => 'You must agree the rules.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'accept' => 'I completely accept the rules.'
        ];
    }
}
