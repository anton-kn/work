<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\Employee $employee */

$this->title = 'Создать заявку';
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="request-create">
    <?php if (isset($error)) {
        echo $error;
    } ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="request-form">
        <?php if (isset($error)) { ?>
            <div class="">
                <?php
                echo $error;
                ?>
            </div>
        <?php } ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Роль</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <?php echo $employee->getEmployeeRole()->one()->name;
                        ?>
                    </td>
                    <td><?php echo $employee->fio; ?></td>
                    <td><?php echo $employee->email; ?></td>
                </tr>
            </tbody>
        </table>

        <?php $form = ActiveForm::begin(['method' => 'get']); ?>
        <?= $form->field($model, 'text')->textarea()->label("Текст заявки") ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

</div>