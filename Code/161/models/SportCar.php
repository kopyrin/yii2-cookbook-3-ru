<?php

namespace app\models;

use Yii;

/**
 * Class SportCar
 * @package app\models
 */
class SportCar extends Car
{
    const TYPE = 'sport';

    /**
     * @return CarQuery
     */
    public static function find()
    {
        return new CarQuery(get_called_class(), ['where' => ['type' => self::TYPE]]);
    }

    /**
     * @param bool $insert
     *
     * @return bool
     */
    public function beforeSave($insert)
    {
        $this->type = self::TYPE;
        return parent::beforeSave($insert);
    }
}