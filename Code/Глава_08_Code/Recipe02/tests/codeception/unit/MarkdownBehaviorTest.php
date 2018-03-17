<?php

namespace app\tests\codeception\unit;

use app\models\Post;
use app\tests\codeception\unit\fixtures\PostFixture;
use yii\codeception\DbTestCase;

class MarkdownBehaviorTest extends DbTestCase
{
    public function testNewModelSave()
    {
        $post = new Post();
        $post->title = 'Title';
        $post->content_markdown = 'New *markdown* text';

        $this->assertTrue($post->save());
        $this->assertEquals("<p>New <em>markdown</em> text</p>\n", $post->content_html);
    }

    public function testExistingModelSave()
    {
        $post = Post::findOne(1);

        $post->content_markdown = 'Other *markdown* text';
        $this->assertTrue($post->save());

        $this->assertEquals("<p>Other <em>markdown</em> text</p>\n", $post->content_html);
    }

    public function fixtures()
    {
        return [
            'posts' => [
                'class' => PostFixture::className(),
            ]
        ];
    }
}