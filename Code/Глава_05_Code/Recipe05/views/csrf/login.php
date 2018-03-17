<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';

?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'action' => Url::toRoute('csrf/login', true),
    'options' => ['class' => 'form-horizontal']
]); ?>

<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'rememberMe')->checkbox() ?>

<?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>