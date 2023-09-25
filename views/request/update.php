<?php

use app\models\Employee;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/** @var yii\web\View $this */
/** @var app\models\Request $model */

$this->title = 'Изменить заявку: ' . $model->text;
echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Админ',
        'url' => ['/admin'],
    ],
    'links' => [
        [
            "label" => '/Заявки',
            "url" => ['request/index']
        ],
        "lavel" => "/Изменить: " . $model->id,
    ],
]);
?>
<div class="request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="request-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>


        <?php
        $item = ArrayHelper::map(Employee::find()->all(), 'id', 'fio');
        $params = [
            'prompt' => 'Укажите пользователя',
        ];

        ?>

        <?= $form->field($model, isset($model->from_employee_id) ? 'from_employee_id' : "")->dropDownList($item, $params)->label("От кого") ?>

        <?= $form->field($model, 'to_emoloyee_id')->dropDownList($item, $params)->label("От кого") ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>