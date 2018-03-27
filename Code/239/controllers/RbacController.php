<?php

namespace app\controllers;

use app\models\User;
use stdClass;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;

/**
 * Class RbacController.
 */
class RbacController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['test'],
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }


    /**
     * @param $description
     * @param $rule
     * @param array $params
     *
     * @return string
     */
    protected function renderAccess($description, $rule, $params = [])
    {
        $access = Yii::$app->user->can($rule, $params);

        return $description . ' : ' . ($access ? 'yes' : 'no');
    }

    public function actionTest()
    {
        $post = new stdClass();
        $post->created_by = User::findByUsername('samuel')->id;

        return $this->renderContent(
            Html::tag('h1', 'Current permissions').
            Html::ul([
                $this->renderAccess('User can create post', 'createPost'),
                $this->renderAccess('User can read any post', 'readPost'),
                $this->renderAccess('User can update any post', 'updatePost'),
                $this->renderAccess('User can update own post', 'updateOwnPost', [
                    'post' => $post,
                ]),


            ])
        );
    }
}
