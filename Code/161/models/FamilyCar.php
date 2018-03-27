<?php

namespace app\models;

use Yii;

/**
 * Class FamilyCar
 * @package app\models
 */
class FamilyCar extends Car
{
    const TYPE = 'family';

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