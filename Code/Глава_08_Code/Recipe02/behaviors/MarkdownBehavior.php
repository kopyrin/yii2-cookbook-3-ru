<?php

namespace app\behaviors;

use yii\base\Behavior;
use yii\base\Event;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\helpers\Markdown;

class MarkdownBehavior extends Behavior
{
    public $sourceAttribute;
    public $targetAttribute;

    public function init()
    {
        if (empty($this->sourceAttribute) || empty($this->targetAttribute)) {
            throw new InvalidConfigException('Source and target must be set.');
        }
        parent::init();
    }

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'onBeforeSave',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'onBeforeSave',
        ];
    }

    public function onBeforeSave(Event $event)
    {
        if ($this->owner->isAttributeChanged($this->sourceAttribute)) {
            $this->processContent();
        }
    }

    private function processContent()
    {
        $model = $this->owner;
        $source = $model->{$this->sourceAttribute};
        $model->{$this->targetAttribute} = Markdown::process($source);
    }
}