<?php

use \yii\Helpers\Html;

/* @var $this \yii\web\View */
?>

<?php $this->beginBlock('beforeContent');
    echo Html::tag('pre', 'Your IP is ' . Yii::$app->request->userIP);
$this->endBlock(); ?>

<?php $this->beginBlock('footer');
    echo Html::tag('h3', 'My custom footer block');
$this->endBlock(); ?>


<h1>Blocks usage example</h1>