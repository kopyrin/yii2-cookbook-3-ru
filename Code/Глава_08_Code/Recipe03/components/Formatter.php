<?php

namespace app\components;

class Formatter extends \yii\i18n\Formatter
{
    public function asNumber($value, $decimal = 2)
    {
        return number_format($value, $decimal, '.', ',');
    }
}