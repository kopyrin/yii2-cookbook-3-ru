<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "film".
 *
 * @property integer $id
 * @property string $title
 * @property integer $release_year
 */
class Film extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'release_year'], 'required'],
            [['release_year'], 'integer'],
            [['title'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'release_year' => 'Release Year',
        ];
    }
}
