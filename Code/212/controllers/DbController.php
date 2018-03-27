<?php

namespace app\controllers;

use app\models\Post;
use app\models\Comment;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;

/**
 * Class DbController
 * @package app\controllers
 */
class DbController extends Controller
{
    public function actionIndex()
    {
        $post        = new Post();
        $post->title = "Post #" . rand(1, 1000);
        $post->text  = "text";
        $post->save();

        $posts = Post::find()->all();

        echo Html::tag('h1', 'Posts');
        echo Html::ul(ArrayHelper::getColumn($posts, 'title'));

        $comment         = new Comment();
        $comment->post_id = $post->id;
        $comment->text   = "comment #" . rand(1, 1000);
        $comment->save();

        $comments = Comment::find()->all();

        echo Html::tag('h1', 'Comments');
        echo Html::ul(ArrayHelper::getColumn($comments, 'text'));
    }
}