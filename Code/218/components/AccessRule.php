<?php

namespace app\components;

use app\models\User;

class AccessRule extends \yii\filters\AccessRule
{
    /**
     * @param \yii\web\User $user
     *
     * @return bool
     */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }

        $isGuest = $user->getIsGuest();

        foreach ($this->roles as $role) {
            switch ($role) {
                case '?':
                    return $isGuest;
                case '@':
                    return !$isGuest;
                case User::ROLE_ADMIN:
                case User::ROLE_USER:
                    return !$isGuest && $role == $user->identity->role;
                default:
                    return $user->can($role);
            }
        }

        return false;
    }
}
