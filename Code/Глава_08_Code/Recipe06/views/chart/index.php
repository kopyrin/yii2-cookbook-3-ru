<?php
use app\widgets\ChartWidget;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Chart';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= ChartWidget::widget([
        'title' => 'My Chart Diagram',
        'data' => [
            100 - 32,
            32,
        ],
        'labels' => [
            'Big',
            'Small',
        ],
    ]) ?>
</div>
