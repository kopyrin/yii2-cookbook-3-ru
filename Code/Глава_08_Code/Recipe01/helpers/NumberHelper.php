<?php

namespace app\helpers;

class NumberHelper
{
    public static function format($value, $decimal = 2)
    {
        return number_format($value, $decimal, '.', ',');
    }
}