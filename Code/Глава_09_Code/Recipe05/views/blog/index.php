<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $articles app\models\Article[] */

$this->title = 'Articles';;
$this->params['breadcrumbs'][] = $this->title;
?>

<?php foreach($articles as $article): ?>
    <h3><?= Html::a(Html::encode($article->title), ['view', 'id' => $article->id]) ?></h3>
    <div>Created <?= Yii::$app->formatter->asDatetime($article->created_at) ?></div>
    <div>Updated <?= Yii::$app->formatter->asDatetime($article->updated_at) ?></div>
<?php endforeach ?>