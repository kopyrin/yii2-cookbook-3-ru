Библиотека Imagine 
===
Imagine, библиотека ООП для обработки изображений. Он позволяет обрезать, изменять размер и выполнять другие манипуляции с различными изображениями с помощью расширений GD, Imagic и Gmagic PHP. Yii2-Imagine-это легкая статическая оболочка для библиотеки.

Подготовка 
---

1 Создайте новое приложение с помощью диспетчера пакетов Composer, как описано в официальном руководстве по адресу <http://www.yiiframework.com/doc-2.0/guide-start-installation.html>. 
По русски <http://yiiframework.domain-na.me/doc/guide/2.0/ru/start-installation>.

2 Установите расширение с помощью следующей команды:

***composer require yiisoft/yii2-imagine***

Как это сделать...
---
В своих проектах вы можете использовать расширение двумя способами:

* Используя его как фабрика
* Используя внутренние методы

***Используя его как фабрика***

Можно использовать экземпляр исходного класса библиотеки Imagine:
```php
$imagine = new Imagine\Gd\Imagine();
// or
$imagine = new Imagine\Imagick\Imagine();
// or
$imagine = new Imagine\Gmagick\Imagine();
```
Однако это зависит от существующих соответствующих расширений PHP в вашей системе. Вы можете использовать getImagine() метод:
```php
$imagine = \yii\imagine\Image::getImagine();
```

***Использование внутренних методов***
Вы можете использовать методы crop(), thumbnail(), watermark(), text () и frame() для обычных высокоуровневых манипуляций, подобных этому:
```php
<?php
use yii\imagine\Image;
Image::crop('path/to/image.jpg', 100, 100, ManipulatorInterface::THUMBNAIL_OUTBOUND)
->save('path/to/destination/image.jpg', ['quality' => 90]);
```
Смотрите сигнатуры всех поддерживаемых методов  в исходном коде класса \yii\imagine\BaseIm.

Как это работает...
---
Расширение подготавливает пользовательские данные, создает исходный объект Imagine и вызывает на нем соответствующий метод. Все методы возвращают этот исходный объект image. Вы можете продолжать управлять изображением или сохранить результат на диск.

Смотрите так же
---
 Дополнительные сведения о расширении см. по следующим URL-адресам:
* <http://www.yiiframework.com/doc-2.0/ext-imagine-index.html>
* <https ://git.hub.com/yiisoft/yii2-ima gine>
* Для получения информации об исходной библиотеке см. <http://imagine.readthedocs.org/en/latest/>
