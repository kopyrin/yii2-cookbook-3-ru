<?php

use yii\helpers\Html;
use yii\helpers\Url;

/*
 * @var yii\web\View $this
 * @var app\models\Post $model
 */

?>
<p><?= Html::a('< back to posts', Url::toRoute('post/index')); ?></p>

<h2><?= Html::encode($model->title);?></h2>
<p><?= Html::encode($model->content);?></p>