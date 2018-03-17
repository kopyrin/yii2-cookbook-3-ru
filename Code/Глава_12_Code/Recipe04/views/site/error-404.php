<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Not Found!';
?>
<div class="site-error-404">

    <h1>Oops!</h1>

    <p>Sorry, but requested page not found.</p>

    <p>
        Please follow to <?= Html::a('index page', ['site/index']) ?>
        to continue reading. Thank you.
    </p>

</div>
