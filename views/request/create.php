<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/** @var yii\web\View $this */
/** @var app\models\Request $model */

$this->title = 'Создать заявку';
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
        "lavel" => "/" . $this->title,
    ],
]);
?>
<?php
$this->registerJsFile(
    '@web/js/index.js',
);
?>
<div class="request-create">
    <?php if (isset($error)) {
        echo $error;
    } ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="request-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'text')->textarea() ?>

        <?php
        $item = ArrayHelper::map($employee::find()->all(), 'id', 'fio');
        $params = [
            'prompt' => 'Укажите получателя',
        ];

        ?>
        <?= $form->field($model, 'to_emoloyee_id')->dropDownList($item, $params)->label("Кому");
        ?>
        <div id="employee-info-js" style="display: none;">

        </div>

        <br><br>
        <label>От</label>
        <?= $form->field($employee, 'email')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>