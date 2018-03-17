<?php
/* @var $this \yii\web\View */
/* @var $message \yii\mail\MessageInterface */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
<?php $this->endPage() ?>