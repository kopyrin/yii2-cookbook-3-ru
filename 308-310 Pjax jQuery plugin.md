Pjax jQuery plugin
==
Pjax-это виджет, который интегрирует плагин pjax jQuery. Все содержимое, обернутое этим виджетом, будет перезагружено AJAX без обновления текущей страницы. Виджет также использует API истории HTML5 для изменения текущего URL в адресной строке браузера.

Подготовка 
--
Создайте новое приложение с помощью диспетчера пакетов Composer, как описано в официальном руководстве по адресу <http://www.yiiframework.com/doc-2.0/guide-start-installation.html>. 
По русски <http://yiiframework.domain-na.me/doc/guide/2.0/ru/start-installation>.

Как это сделать...
---
В следующем примере показано, как использовать pjax с виджетом yii\grid\Gridview:
```php
<?php
use yii\widgets\Pjax;
?>
<?php Pjax::begin(); ?>
    <?= GridView::widget([...]); ?>
<?php Pjax::end(); ?>
```
Просто оберните любой фрагмент кода в вызов Pjax::begin() и Pjax::end().
Это отобразит следующий HTML-код:
```php
<div id="w1">
    <div id="w2" class="grid-view">...</div>
</div>
<script type="text/javascript">jQuery(document).ready(function () {
    jQuery(document).pjax("#w1 a", "#w1", {...});
});</script>
```
Весь завернутый контент со ссылками разбиения на страницы и сортировки будет перезагружен AJAX.

***Указание пользовательского идентификатора***

Pjax получает содержимое страницы из запросов AJAX, а затем извлекает собственный элемент DOM с тем же идентификатором. Производительность отрисовки страниц можно оптимизировать путем отрисовки содержимого без макета, особенно для запросов Pjax:
```php
public function actionIndex()
{
    $dataProvider = ...;
    if (Yii::$app->request->isPjax) {
        return $this->renderPartial('_items', [
            'dataProvider' => $dataProvider,
        ]);
    } else {
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
```
По умолчанию метод yii\base\widget::getid увеличивает идентификаторы и, следовательно, виджеты на любой странице с увеличенными атрибутами:
```php
<nav id="w0">...</nav> // Main navigation
<ul id="w1">...</ul> // Breadcrumbs widget
<div id="w2">...</div> // Pjax widget
```
Для рендеринга с использованием методов renderPartial() или renderAjax() без рендеринга макета на вашей странице будет только один виджет с номером 0:
```php
<div id="w0">...</div> // Pjax widget
```
В результате ваш собственный виджет не найдет свой блок с селектором w2 при следующем запросе.
Однако Pjax найдет тот же блок с селектором w2 в ответе Ajax. В результате ваш собственный виджет не найдет блок с селектором w2 при следующем запросе.
Поэтому необходимо вручную указать уникальный идентификатор для всех виджетов Pjax, чтобы избежать различных конфликтов:
```php
<?php Pjax::begin(['id' => 'countries']) ?>
    <?= GridView::widget([...]); ?>
<?php Pjax::end() ?>
```

***Использование ActiveForm***

По умолчанию Pjax работает только со ссылками в блоке wrapped. Если вы хотите использовать его с виджетом ActiveForm, необходимо использовать параметр data-pjax формы:
```php
<?php
use \yii\widgets\Pjax
use \yii\widgets\ActiveForm;
<?php yii\widgets\Pjax::begin(['id' => 'my-block']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true,]]); ?>
        <?= $form->field($model, 'name') ?>
    <?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>
```
Он добавляет соответствующих слушателей на форму отправки события.
Можно также использовать параметр $formSelector виджета Pjax, чтобы указать, какая отправка формы может вызвать pjax.

***Работа со сценарием на стороне клиента***

Вы можете подписаться на события контейнера:
```php
<?php $this->registerJs('
    $("#my-block").on("pjax:complete", function() {
        alert('Pjax is completed');
    });
'); ?>
```
Или можно перезагрузить контейнер вручную с помощью его селектора:
```php
<?php $this->registerJs('
    $("#my-button").on("click", function() {
        $.pjax.reload({container:"#my-block"});
    });
'); ?>
```

Как это работает...
---
Pjax-это простая оболочка для любого фрагмента кода. Он подписывается на события кликов всех ссылок в фрагменте и заменяет всю страницу, перезагружая ее в Ajax-вызовы. Мы можем использовать атрибут data-pjax для завернутых форм, и любые представления форм вызовут запрос Ajax.
Виджет будет загружать и обновлять содержимое тела виджета "на лету" без загрузки ресурсов макета (JS,CSS).
Вы можете настроить $linkSelector виджета, чтобы указать, какие ссылки должны вызвать Pjax, и настроить $formSelector, чтобы указать, что форма подачи может вызвать Pjax.
Вы можете отключить Pjax для определенной ссылки внутри контейнера, добавив атрибут data-pjax="0" к этой ссылке.

Смотрите так же
---

Дополнительные сведения об использовании расширения см. в разделе:
* <http://www.viiframework.com/doc-2.0/vii-widgets-piax.html>
* <https://github.com/yiisoft/jquery-pjax>

 Дополнительные сведения о параметрах и методах на стороне клиента см. в разделе
* <https://github.com/yiisoft/jquery-pjax#usage> 
