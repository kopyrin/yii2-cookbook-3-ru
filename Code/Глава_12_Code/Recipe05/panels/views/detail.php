<?php
/* @var $panel app\panels\UserPanel */
use yii\widgets\DetailView;
?>
<h1>User profile</h1>
<?php if (!empty($panel->data)): ?>
    <?= DetailView::widget([
        'model' => $panel->data,
        'attributes' => [
            'id',
            'username',
        ]
    ]) ?>
<?php else: ?>
    <p>Guest Session.</p>
<?php endif;?>
