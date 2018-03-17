<?php

namespace tests\api;

use ApiTester;
use tests\fixtures\PostFixture;
use yii\helpers\Url;

class PostsCest
{
    function _before(ApiTester $I)
    {
        $I->haveFixtures([
            'post' => [
                'class' => PostFixture::className(),
                'dataFile' => codecept_data_dir() . 'post.php'
            ]
        ]);
    }

    public function testGetAll(ApiTester $I)
    {
        $I->sendGET('/api/posts');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([0 => ['title' => 'First Post']]);
    }

    public function testGetOne(ApiTester $I)
    {
        $I->sendGET('/api/posts/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['title' => 'First Post']);
    }

    public function testGetNotFound(ApiTester $I)
    {
        $I->sendGET('/api/posts/100');
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['name' => 'Not Found']);
    }

    public function testCreate(ApiTester $I)
    {
        $I->sendPOST('/api/posts', [
            'title' => 'Test Title',
            'text' => 'Test Text',
        ]);
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['title' => 'Test Title']);
    }

    public function testUpdate(ApiTester $I)
    {
        $I->sendPUT('/api/posts/2', [
            'title' => 'New Title',
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'title' => 'New Title',
            'text' => 'Old Text For Updating',
        ]);
    }

    public function testDelete(ApiTester $I)
    {
        $I->sendDELETE('/api/posts/3');
        $I->seeResponseCodeIs(204);
    }
}