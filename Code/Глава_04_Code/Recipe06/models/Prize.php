<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prize".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ContestPrizeAssn[] $contestPrizeAssns
 */
class Prize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prize';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [ ['name','amount'], 'required'],
            [['amount'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContestPrizeAssns()
    {
        return $this->hasMany(ContestPrizeAssn::className(), ['prize_id' => 'id']);
    }
}
