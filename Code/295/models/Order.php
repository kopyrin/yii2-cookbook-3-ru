<?php

namespace app\models;

use Yii;
use yii\elasticsearch\ActiveRecord;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property string $date
 */
class Order extends ActiveRecord
{
    public function attributes()
    {
        return ['id', 'customer_id', 'date'];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }
}