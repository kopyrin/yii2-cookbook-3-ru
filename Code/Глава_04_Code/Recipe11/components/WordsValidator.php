<?php

namespace app\components;

use yii\validators\Validator;

class WordsValidator extends Validator
{
    public $size = 50;
    public $message = 'The number of words must be less than {size}';

    public function validateValue($value)
    {
        preg_match_all('/(\w+)/i', $value, $matches);

        if (count($matches[0]) > $this->size) {
            return [$this->message, ['size' => $this->size]];
        }
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
        $message = strtr($this->message, ['{size}' => $this->size]);

        return <<<JS
            if (value.split(/\w+/gi).length > $this->size ) {
                messages.push("$message");
            }
JS;
    }
}
