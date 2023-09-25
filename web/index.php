<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

// (new yii\web\Application($config))->run();
$app = new yii\web\Application($config);
// Меняем базовый контроллер
$app->defaultRoute = 'employee/list';
$app->homeUrl = '@web/employee/list';
$app->run();


function dde($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit();
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
