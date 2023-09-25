<?php

use app\models\EmployeeRole;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;
use yii\bootstrap5\ActiveForm;


$role = new EmployeeRole();

/** @var yii\web\View $this */
/** @var app\models\Employee $model */

$this->title = $model->fio;
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
        "lavel" => "/" . $model->fio,
    ],
]);
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

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
            'fio',
            'email:email',
            'employee_role_id' =>
            [
                'attribute' => 'employee_role_id',
                'value' => function ($data) use ($role) {
                    $role = $role->findOne($data->employee_role_id);
                    return $role->name;
                }
            ],
        ],
    ]) ?>

</div>