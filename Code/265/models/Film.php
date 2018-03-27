<?php

namespace app\models;

use \yii\db\ActiveRecord;

class Film extends ActiveRecord
{

    public static function tableName()
    {
        return 'film';
    }

    public function rules()
    {
        return [
            [['title', 'description', 'release_year'], 'required'],
            [['description'], 'string'],
            [['release_year'], 'integer'],
            [['title'], 'string', 'max' => 64]
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'release_year' => 'Release Year',
        ];
    }

}