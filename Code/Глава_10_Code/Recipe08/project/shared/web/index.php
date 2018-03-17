<?php

defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

$dir = dirname($_SERVER['SCRIPT_FILENAME']);

require($dir . '/../vendor/autoload.php');
require($dir . '/../vendor/yiisoft/yii2/Yii.php');

$config = require($dir . '/../config/web.php');

(new yii\web\Application($config))->run();

