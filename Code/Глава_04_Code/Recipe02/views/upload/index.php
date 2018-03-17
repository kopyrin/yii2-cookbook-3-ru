<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= Html::beginForm('', 'post', ['enctype'=>'multipart/form-data'])?>
    <?= Html::submitButton('Upload', ['class' => 'btn btn-success'])?>

<?php ActiveForm::end() ?>