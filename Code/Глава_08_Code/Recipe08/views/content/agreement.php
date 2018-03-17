<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\AgreementForm */

$this->title = 'User agreement';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please agree with our rules:</p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'accept')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Accept', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['/site/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
