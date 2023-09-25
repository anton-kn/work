<?php

namespace app\Repository;

use app\Entity\Employee;
use app\Entity\ListEmployees;
use PDO;
use Yii;

/**
 * Репозиторий сотрудников
 */
class EmployeesListRepository
{

    /**
     * Рандомный алиас
     * @return string
     */
    private function randomAlias()
    {
        $n = 20;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    /**
     * Получаем весь список сотрудников
     * @return ListEmployees
     */
    public function all(): ListEmployees
    {
        $sql = "SELECT er.name , e.id, e.fio , e.email  FROM employee e
        INNER JOIN employee_role er ON e.employee_role_id = er.id";

        $employees = Yii::$app->db->createCommand($sql)->queryAll();

        $listEmployees = new ListEmployees();
        foreach ($employees as $row) {
            $employee = new Employee();
            $employee->setAlias($this->randomAlias())
                ->fromArray($row);
            $listEmployees->setEmployees($employee);
        }

        return $listEmployees;
    }
}
