<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contest".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ContestPrizeAssn[] $contestPrizeAssns
 */
class Contest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
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
        return $this->hasMany(ContestPrizeAssn::className(), ['contest_id' => 'id']);
    }
}
