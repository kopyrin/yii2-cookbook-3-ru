<?php

namespace app\components;

use yii\validators\Validator;

class WordsValidator extends Validator
{
    public $size = 50;

    public function validateValue($value)
    {
        if (str_word_count($value) > $this->size) {
            return ['The number of words must be less than {size}', ['size' => $this->size]];
        }
        return false;
    }
}
