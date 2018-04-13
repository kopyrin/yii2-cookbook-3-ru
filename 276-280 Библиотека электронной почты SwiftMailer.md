Библиотека электронной почты SwiftMailer
===
Многие веб-приложения должны отправлять уведомления и подтверждать действия клиента по электронной почте по соображениям безопасности. Yii2 предоставляет обертку  yiisoft/yii2 - swiftmailer, для  библиотеки SwiftMailer.

Подготовка 
---
Создайте новое приложение с помощью диспетчера пакетов Composer, как описано в официальном руководстве по адресу <http://www.yiiframework.com/doc-2.0/guide-start-installation.html>. 
По русски <http://yiiframework.domain-na.me/doc/guide/2.0/ru/start-installation>
Как basic, так и advances приложение содержат это расширение из коробки.

Как это сделать...
---
Теперь мы попробуем отправить любой вид электронной почты из нашего собственного приложения.
***Послание текстового сообщения***

1 Установите конфигурацию почтовой программы в файле config/console.php:
```php
'components' => [
    // ...
    'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        'useFileTransport' => true,
    ],
    // ...
],
```

2 Создайте контроллер консольного теста, MailController, с помощью следующего кода:
```php
<?php
namespace app\commands;
use yii\console\Controller;
use Yii;
class MailController extends Controller
{
    public function actionSend()
    {
        Yii::$app->mailer->compose()
            ->setTo('to@yii-book.app')
            ->setFrom(['from@yii-book.app' => Yii::$app->name])
            ->setSubject('My Test Message')
            ->setTextBody('My Text Body')
            ->send();
    }
}
```

3 Выполните следующую команду консоли:

***php yii mail/send***

4 Проверьте каталог runtime/mail. Он должен содержать файлы с вашими письмами.

***Примечание***: файлы почты содержат сообщения в специальном   формате электронной почты , совместимый с любыми почтовым программное обеспечение. Это сообщение также можно открыть в виде обычного текста.

5 Задайте для параметра useFileTransport значение false или удалите эту строку из конфигурации:
```php
'mailer' => [
    'class' => 'yii\swiftmailer\Mailer',
],
```
Затем поместите свой реальный идентификатор электронной почты в метод setTo ():
```php
->setTo('my@real-email.com')
```

6 Снова выполните команду консоли:

***php yii mail/send***

7 Проверьте папку входящие.

***Примечание***: SwiftMailer использует стандартную функцию PHP mail () для отправки почты по умолчанию. Пожалуйста, проверьте это
Как ваш сервер настроен для отправки почты через функцию mail().
Многие почтовые системы отклоняют письма без DKIM and SPF подписей (отправленные функцией mail() например) или помещают их в папку спама.

***Отправка содержимого HTML***

1 Убедитесь, что приложение содержит сообщение mail/layouts/html.php файл и добавить в mail/layouts/text.php файл со следующим содержанием:
```php
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
```

2 Создайте свой собственный вид в файле mail/message-html.php:
```php
<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $name string */
?>
<p>Hello, <?= Html::encode($name) ?>!</p>
```
Создать mail/message-text.php файл с тем же содержимым, но без HTML тегов:
```php
<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $name string */
?>
Hello, <?= Html::encode($name) ?>!
```

3 Создать контроллер консоли, Mailcontroller, с помощью следующего кода:
```php
<?php
namespace app\commands;
use yii\console\Controller;
use Yii;
class MailController extends Controller
{
    public function actionSendHtml()
    {
        $name = 'John';
        Yii::$app->mailer->compose('message-html',['name' => $name])
            ->setTo('to@yii-book.app')
            ->setFrom(['from@yii-book.app' => Yii::$app->name])
            ->setSubject('My Test Message')
            ->send();
    }
    public function actionSendCombine()
    {
        $name = 'John';
        Yii::$app->mailer->compose(
            ['html' =>'message-html', 
             'text' => 'message-text'], 
             ['name' => $name,])
            ->setTo('to@yii-book.app')
            ->setFrom(['from@yii-book.app' => Yii::$app->name])
            ->setSubject('My Test Message')
            ->send();
    }
}
```

4 Выполните следующие команды консоли:
```php
php yii mail/send-html
php yii mail/se
nd-combine
```

***Работа с транспортом SMTP***

1 Задайте параметр transport для компонента mailer следующим образом:
```php
'mailer' => [
    'class' => 'yii\swiftmailer\Mailer',
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'smtp.gmail.com',
        'username' => 'username@gmail.com',
        'password' => 'password',
        'port' => '587',
        'encryption' => 'tls',
    ],
],
```

2 Напишите и запустите следующий код:
```php
Yii::$app->mailer->compose()
    ->setTo('to@yii-book.app')
    ->setFrom('username@gmail.com')
    ->setSubject('My Test Message')
    ->setTextBody('My Text Body')
    ->send();
````

3 Проверьте свой почтовый ящик Gmail.

***Примечание.*** Gmail автоматически переписывает поле " От " в ваш идентификатор электронной почты профиля по умолчанию, но другие системы электронной почты не делают то же самое. Всегда используйте идентичный идентификатор электронной почты в конфигурации транспорта и в методе setFrom () для передачи политик защиты от спама для других систем электронной почты.

***Прикрепление файлов и встраивание изображений***

Добавьте соответствующий метод, чтобы прикрепить любой файл к вашей почте:
```php
class MailController extends Controller
{
    public function actionSendAttach()
    {
        Yii::$app->mailer->compose()
            ->setTo('to@yii-book.app' )
            ->setFrom(['from@yii-book.app' => Yii::$app->name])
            ->setSubject('My Test Message')
            ->setTextBody('My Text Body')
            ->attach(Yii::getAlias('@app/README.md'))
            ->send();
    }
}
```
Или используйте метод embed () в файле представления электронной почты, чтобы вставить изображение в содержимое электронной почты:
```php
<img src="<?= $message->embed($imageFile); ?>">
```
Он автоматически прикрепляет файл изображения и вставляет его уникальный идентификатор.

Как это работает...
---
Обертка реализует базовый \yii\mail\MailerInterface. Его compose () метод возвращает объект сообщения (реализация \yii\mail\MessageInterface).
Вы можете вручную задать простой текст и содержимое HTML с помощью методов setTextBody () и setHtmlBody (), или вы можете передать параметры представления и представления в метод compose (). В этом случае почтовая программа вызывает метод \yii\web\view::render() для отрисовки соответствующего содержимого.
Параметр useFileTransport хранит письма в файлах вместо реальной отправки. Это полезно для локальной разработки и тестирования приложений.

Смотрите так же
----
Для получения дополнительной информации о коде расширения yii2 - swiftmailer, посетите следующие руководства:
* <http://www.yiiframework.com/doc-2.0/guide-tutorial-mailing.ht.ml>
 По русски <http://yiiframework.domain-na.me/doc/guide/2.0/ru/tutorial-mailing>
* <http://www.yiiframework.com/doc-2.0/ext-swiftmailer-index.html>
 Чтобы узнать больше об исходной библиотеке swiftMailer, обратитесь к следующим URL:
* <http://swiftmailer.org/docs/introduction.html>
* <https ://github.com/swiftma iler/swiftmailer>
