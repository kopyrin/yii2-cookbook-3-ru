<?php

namespace app\models;

use Yii;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "blog_post".
 *
 * @property integer $id
 * @property integer $author_id
 * @property integer $updater_id
 * @property string $title
 * @property string $text
 */
class BlogPost extends \yii\db\ActiveRecord
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\behaviors\BlameableBehavior',
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => 'author_id',
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => 'updater_id'
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'updater_id'], 'integer'],
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'updater_id' => 'Updater ID',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
}
