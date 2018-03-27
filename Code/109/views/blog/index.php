<?php

/* @var $category string */
/* @var $posts array */
/* @var $this \yii\web\View */

?>

<div class="row">
    <div class="col-xs-7">
        <h1>Posts</h1>
        <hr>
        <?php foreach($posts as $post): ?>
            <h3><?= $post['title']?></h3>
            <p><?= $post['content']?></p>
        <?php endforeach ;?>
    </div>
    <div class="col-xs-5">
        <?= $this->render('//common/twitter', [
            'widget_id' => '620531418213576704',
            'screen_name' => 'php_net'
        ]);?>
    </div>
</div>