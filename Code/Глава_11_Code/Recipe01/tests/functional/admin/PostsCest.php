<?php

namespace tests\functional\admin;

use app\models\Post;
use FunctionalTester;
use tests\fixtures\PostFixture;
use yii\helpers\Url;

class PostsCest
{
    function _before(FunctionalTester $I)
    {
        $I->haveFixtures([
            'post' => [
                'class' => PostFixture::className(),
                'dataFile' => codecept_data_dir() . 'post.php'
            ]
        ]);
    }

    public function testIndex(FunctionalTester $I)
    {
        $I->amOnPage(['admin/posts/index']);
        $I->see('Posts', 'h1');
    }

    public function testView(FunctionalTester $I)
    {
        $I->amOnPage(['admin/posts/view', 'id' => 1]);
        $I->see('First Post', 'h1');
    }

    public function testCreateInvalid(FunctionalTester $I)
    {
        $I->amOnPage(['admin/posts/create']);
        $I->see('Create', 'h1');

        $I->submitForm('#post-form', [
            'Post[title]' => '',
            'Post[text]' => '',
        ]);

        $I->expectTo('see validation errors');
        $I->see('Title cannot be blank.', '.help-block');
        $I->see('Text cannot be blank.', '.help-block');
    }

    public function testCreateValid(FunctionalTester $I)
    {
        $I->amOnPage(['admin/posts/create']);
        $I->see('Create', 'h1');

        $I->submitForm('#post-form', [
            'Post[title]' => 'Post Create Title',
            'Post[text]' => 'Post Create Text',
            'Post[status]' => 'Active',
        ]);

        $I->expectTo('see view page');
        $I->see('Post Create Title', 'h1');
    }

    public function testUpdate(FunctionalTester $I)
    {
        // ...
    }

    public function testDelete(FunctionalTester $I)
    {
        $I->amOnPage(['/admin/posts/view', 'id' => 3]);
        $I->see('Title For Deleting', 'h1');

        $I->amGoingTo('delete item');
        $I->sendAjaxPostRequest(Url::to(['/admin/posts/delete', 'id' => 3]));
        $I->expectTo('see that post is deleted');
        $I->dontSeeRecord(Post::className(), [
            'title' => 'Title For Deleting',
        ]);
    }
}