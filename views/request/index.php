<?php

use app\models\Employee;
use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

$employee = new Employee();

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Заявки';
echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Админ',
        'url' => ['/admin'],
    ],
    'links' => [
        [
            "label" => '/' . $this->title,
        ],
    ],
]);
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>