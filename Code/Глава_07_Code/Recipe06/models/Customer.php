<?php

namespace app\models;

use Yii;
use yii\elasticsearch\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $registration_date
 */
class Customer extends ActiveRecord
{
    public function attributes()
    {
        return ['id', 'name', 'address', 'registration_date'];
    }

    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'id'])->orderBy('id');
    }
}