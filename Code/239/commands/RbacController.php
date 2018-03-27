<?php

namespace app\commands;

use app\models\User;
use app\rbac\AuthorRule;
use Yii;
use yii\console\Controller;

/**
 * Class RbacController.
 * @package app\commands
 */
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update a post';
        $auth->add($updatePost);

        $readPost = $auth->createPermission('readPost');
        $readPost->description = 'Read a post';
        $auth->add($readPost);


        $reader = $auth->createRole(User::ROLE_READER);
        $auth->add($reader);
        $auth->addChild($reader, $readPost);

        $authorRule = new AuthorRule();
        $auth->add($authorRule);

        $author = $auth->createRole(User::ROLE_AUTHOR);
        $auth->add($author);
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $reader);

        $admin = $auth->createRole(USER::ROLE_ADMIN);
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $authorRule->name;
        $auth->add($updateOwnPost);

        $auth->addChild($updateOwnPost, $updatePost);
        $auth->addChild($author, $updateOwnPost);

        // Assign roles to users.
        $auth->assign($admin, User::findByUsername('admin')->id);
        $auth->assign($author, User::findByUsername('author')->id);
        $auth->assign($reader, User::findByUsername('reader')->id);

        echo "Done!\n";
    }
}
