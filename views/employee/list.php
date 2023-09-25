<?php

/** @var yii\web\View $this */

$this->title = 'Список сотрудников';

?>

<div class="mx-auto p-2" style="width: 200px;">
    Список сотрудников
</div>
<div class="mx-auto p-2" style="width: 1000px;">
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
            <?php
            $i = 0;
            foreach ($employees->getEmployees() as $value) {
                $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $value->getNameRole() ?></td>
                    <td> <a href="<?php echo Yii::getAlias('@request') . $value->getAlias(); ?>"><?php echo $value->getFio() ?></a></td>
                    <td><?php echo $value->getEmail() ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>