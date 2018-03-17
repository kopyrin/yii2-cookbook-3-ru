<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'About';
?>

<div class="col-xs-7">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        This is the About page. You may modify this page.
    </p>
</div>
<div class="col-xs-5">
    <?= $this->render('//common/twitter', [
        'widget_id' => '620526086343012352',
        'screen_name' => 'yiiframework'
    ]);?>
</div>
