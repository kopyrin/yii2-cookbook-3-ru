<?php

/* @var $this \yii\web\View */
/* @var $widget_id integer */
/* @var $screen_name string */

?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php if ($widget_id && $screen_name): ?>
<a class="twitter-timeline"
   data-widget-id="<?= $widget_id?>"
   href="https://twitter.com/<?= $screen_name?>"
   height="300">
    Tweets by @<?= $screen_name?>
</a>
<?php endif;?>