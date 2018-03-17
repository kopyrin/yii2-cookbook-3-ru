<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Actor */

$this->title = 'Update Actor: ' . $model->actor_id;
$this->params['breadcrumbs'][] = ['label' => 'Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actor_id, 'url' => ['view', 'id' => $model->actor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
