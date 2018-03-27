<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<h1>Article form</h1>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success"><?= Yii::$app->session->getFlash('success'); ?></div>
<?php endif; ?>


<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title') ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>