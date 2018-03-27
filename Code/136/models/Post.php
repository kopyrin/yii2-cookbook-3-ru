<?php

namespace app\models;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $lang
 * @property string $title
 * @property string $text
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['lang'], 'string', 'max' => 5],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }

    /**
     * @inheritdoc
     *
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }
}
