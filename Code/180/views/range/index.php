<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\RangeInputWidget;

?>

<h1>Range form</h1>

<?php if (Yii::$app->session->hasFlash('rangeFormSubmitted')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('rangeFormSubmitted'); ?>
    </div>
<?php endif?>

<?= Html::errorSummary($model, ['class'=>'alert alert-danger'])?>

<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'form-inline'
    ]
]); ?>

<div class="form-group">
    <?= RangeInputWidget::widget([
        'model' => $model,
        'attributeFrom' => 'from',
        'attributeTo' => 'to',
        'htmlOptions' => [
            'class' =>'form-control'
        ]
    ]) ?>
</div>

    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>

<?php ActiveForm::end(); ?>