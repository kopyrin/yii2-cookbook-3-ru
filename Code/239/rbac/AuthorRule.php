<?php

namespace app\rbac;

use app\models\User;
use yii\rbac\Rule;
use Yii;
/**
 * Checks if authorID matches user passed via params
 */
class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @param string|integer $userId.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($userId, $item, $params)
    {
        $role = Yii::$app->user->identity->role;
        return isset($params['post']) ? $params['post']->created_by == $userId || $role == User::ROLE_ADMIN: false;
    }
}