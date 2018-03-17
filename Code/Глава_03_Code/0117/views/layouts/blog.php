<?php

/* @var $this yii\web\View */
?>

<?php $this->beginContent('@app/views/layouts/main.php'); ?>
    <div class="col-xs-6">
        <?= $content;?>
    </div>
    <div class="col-xs-3">
        <h4>Tags</h4>
        <ul>
            <li><a href="#php">PHP</a></li>
            <li><a href="#yii">Yii</a></li>
        </ul>
    </div>
    <div class="col-xs-3">
        <h4>Links</h4>
        <ul>
            <li><a href="http://yiiframework.com/">Yiiframework</a></li>
            <li><a href="http://php.net/">PHP</a></li>
        </ul>
    </div>
<?php $this->endContent()?>