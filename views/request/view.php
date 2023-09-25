<?php

use app\models\Employee;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

$employee = new Employee();

/** @var yii\web\View $this */
/** @var app\models\Request $model */

$this->title = $model->text;
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
        "lavel" => "/Заявка: " . $model->id,
    ],
]);
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text',
            'from_employee_id' =>
            [
                'attribute' => 'from_employee_id',
                'value' => function ($data) use ($employee) {
                    $employee = $employee->findOne($data->from_employee_id);
                    return isset($employee->fio) ? $employee->fio : "";
                }
            ],
            'to_emoloyee_id' =>
            [
                'attribute' => 'to_emoloyee_id',
                'value' => function ($data) use ($employee) {
                    $employee = $employee->findOne($data->to_emoloyee_id);
                    return isset($employee->fio) ? $employee->fio : "";
                }
            ],
        ],
    ]) ?>

</div>