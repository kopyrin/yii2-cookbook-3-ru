<?php

use app\modules\log\helpers\LogHelper;
use app\modules\log\models\LogRow;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = 'Application log';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'time',
                'format' => 'datetime',
                'contentOptions' => [
                    'style' => 'white-space: nowrap',
                ],
            ],
            'ip:text:IP',
            'userId:text:User',
            [
                'attribute' => 'level',
                'value' => function (LogRow $row) {
                    return LogHelper::levelLabel($row->level);
                },
                'format' => 'raw',
            ],
            'category',
            'text',
        ],
    ]) ?>
</div>
