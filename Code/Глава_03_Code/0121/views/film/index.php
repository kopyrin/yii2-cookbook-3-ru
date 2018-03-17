<?php

use yii\widgets\LinkPager;

/**
 * @var \app\models\Film $models
 * @var \yii\web\View $this
 * @var \yii\data\Pagination $pages
 * @var \yii\data\Sort $sort
 */

?>

<h1>Films List</h1>

<p><?=$sort->link('title')?> | <?=$sort->link('rental_rate')?></p>

<?php foreach ($models as $model): ?>
    <div class="list-group">
        <h4 class="list-group-item-heading"> <?=$model->title ?>
            <label class="label label-default"> <?=$model->rental_rate ?>
            </label>
        </h4>
        <p class="list-group-item-text"><?=$model->description ?></p>
    </div>
<?php endforeach ?>

<?=LinkPager::widget([
    'pagination' => $pages
]); ?>