<?php

namespace app\models;

use app\behaviors\MarkdownBehavior;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $title
 * @property string $content_markdown
 * @property string $content_html
 */
class Post extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%post}}';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content_markdown'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            'markdown' => [
                'class' => MarkdownBehavior::className(),
                'sourceAttribute' => 'content_markdown',
                'targetAttribute' => 'content_html',
            ],
        ];
    }
}
