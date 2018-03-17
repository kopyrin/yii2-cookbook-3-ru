<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

/*
 * @var yii\web\View $this
 * @var yii\data\Pagination $pages
 * @var array $models
 */

?>
<h1>Posts</h1>
<?= Html::a('+ Create a post', Url::toRoute('post/create')); ?>

<?php foreach ($models as $model):?>
    <h3><?= Html::encode($model->title);?></h3>
    <p><?= Html::encode($model->content);?></p>

    <p>
        <?= Html::a('view', Url::toRoute(['post/view', 'id' => $model->id]));?> |
        <?= Html::a('delete', Url::toRoute(['post/delete', 'id' => $model->id]));?>
    </p>
<?php endforeach; ?>

<?= LinkPager::widget([
    'pagination' => $pages,
]); ?>