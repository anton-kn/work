<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Администратор';

?>
<?= Html::a('Заявки', ['request/'], ['class' => 'btn btn-success']) ?>
<?= Html::a('Сотрудники', ['employee/'], ['class' => 'btn btn-success m-1']) ?>
