<?php
use yii\helpers\Html;
?>
<!doctype html>
<head>
    <meta charset="utf-8" />
    <title><?php echo Html::encode(Yii::$app->name)?>
        is under maintenance</title>
</head>
<body>
<h1><?php echo Html::encode(Yii::$app->name)?>
    is under maintenance</h1>
<p>We'll be back soon. If we aren't back for too long,
    please drop a message to <?php echo Yii::$app->params
    ['adminEmail']?>.</p>
<p>Meanwhile, it's a good time to get a cup of coffee,
    to read a book or to check email.</p>
</body>
