<?php
/* @var $panel app\panels\UserPanel */
use yii\helpers\Html;
?>
<div class="yii-debug-toolbar__block">
    <?php if (!empty($panel->data)): ?>
        <a href="<?= $panel->getUrl() ?>">
            User
            <span class="yii-debug-toolbar__label yii-debug-toolbar__label_info">
                <?= Html::encode($panel->data['username']) ?>
            </span>
        </a>
    <?php else: ?>
        <a href="<?= $panel->getUrl() ?>">Guest Session</a>
    <?php endif; ?>
</div>
