<?php
namespace app\panels;

use yii\debug\Panel;
use Yii;

class UserPanel extends Panel
{
    public function getName()
    {
        return 'User';
    }

    public function getSummary()
    {
        return Yii::$app->view->render('@app/panels/views/summary', ['panel' => $this]);
    }

    public function getDetail()
    {
        return Yii::$app->view->render('@app/panels/views/detail', ['panel' => $this]);
    }

    public function save()
    {
        $user = Yii::$app->user;

        return !$user->isGuest ? [
            'id' => $user->id,
            'username' => $user->identity->username,
        ] : null;
    }
} 