<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\web\View;

$url = Url::toRoute(['dropdown/get-sub-categories']);
$this->registerJs("

(function(){
    var select = $('#product-sub_category_id');

    var buildOptions = function(options) {
        if (typeof options === 'object') {
            select.children('option').remove();
            $('<option />')
                .appendTo(select)
                .html('Select a sub category')
            $.each(options, function(index, option) {
                $('<option />', {value:option.id})
                    .appendTo(select)
                    .html(option.title);
            });
        }
    };

    var categoryOnChange = function(category_id){
        $.ajax({
            dataType: 'json',
            url: '" . $url . "&id=' + category_id ,
            success: buildOptions
        });
    };

    window.buildOptions = buildOptions;
    window.categoryOnChange = categoryOnChange;
})();

", View::POS_READY);

?>

<h1>Product</h1>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success"><?= Yii::$app->session->getFlash('success'); ?></div>
<?php endif; ?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(
            Category::find()->where('category_id IS NULL')->asArray()->all(),'id', 'title'), [
        'prompt' => 'Select a category',
        'onChange' => 'categoryOnChange($(this).val());',
    ]) ?>
    <?= $form->field($model, 'sub_category_id')->dropDownList(
        ArrayHelper::map(Category::getSubCategories($model->sub_category_id), 'id' ,'title'), [
        'prompt' => 'Select a sub category',
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>