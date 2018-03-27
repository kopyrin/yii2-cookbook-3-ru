<?php

use yii\widgets\ContentDecorator;

/* @var */
?>

<?php ContentDecorator::begin([
        'viewFile' => '@app/views/decorators/quote.php',
        'view' => $this,
        'params' => ['author' => 'S. Freud']
    ]
);?>
Time spent with cats is never wasted.
<?php ContentDecorator::end();?>