<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/** @var yii\web\View $this */
/** @var app\models\Employee $model */

$this->title = 'Создать сотрудника';
echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Админ',
        'url' => ['/admin'],
    ],
    'links' => [
        [
            "label" => '/Список',
            "url" => ['employee/index']
        ],
        "lavel" => '/Создать',
    ],
]);
?>
<div class="employee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="employee-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'fio')->textInput(['maxlength' => true])->label("ФИО") ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label("Эл. почта") ?>

        <?php
        $item = ArrayHelper::map($role, 'id', 'name');
        $params = [
            'prompt' => 'Укажите роль',
        ];

        ?>
        <?= $form->field($model, 'employee_role_id')->dropDownList($item, $params)->label(false); ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>