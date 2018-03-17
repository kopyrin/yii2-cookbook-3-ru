<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
?>

<div class="panel panel-default">
    <div class="panel-heading"><?= Html::encode($model->title); ?></div>
    <div class="panel-body">
        Category: <?= Html::encode($model->category->name) ?>
    </div>
</div>
