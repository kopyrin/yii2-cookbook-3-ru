<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_allowance".
 *
 * @property integer $user_id
 * @property integer $allowed_number_requests
 * @property string $last_check_time
 */
class UserAllowance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_allowance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['allowed_number_requests'], 'required'],
            [['allowed_number_requests'], 'integer'],
            [['last_check_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'allowed_number_requests' => 'Allowed Number Requests',
            'last_check_time' => 'Last Check Time',
        ];
    }
}
