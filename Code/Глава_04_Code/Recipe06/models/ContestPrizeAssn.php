<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contest_prize_assn".
 *
 * @property integer $contest_id
 * @property integer $prize_id
 *
 * @property Prize $prize
 * @property Contest $contest
 */
class ContestPrizeAssn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contest_prize_assn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contest_id', 'prize_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contest_id' => 'Contest ID',
            'prize_id' => 'Prize ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrize()
    {
        return $this->hasOne(Prize::className(), ['id' => 'prize_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContest()
    {
        return $this->hasOne(Contest::className(), ['id' => 'contest_id']);
    }
}
