<?php

namespace app\Entity;

/**
 * Summary of ListEmployees
 */
class ListEmployees
{

    /**
     * Список сотрудников
     * @var array
     */
    private $employees = [];

    /**
     * Список сотрудников
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    /**
     * Список сотрудников
     * @param Employee $employee Список сотрудников
     * @return ListEmployees
     */
    public function setEmployees(Employee $employee): ListEmployees
    {
        $this->employees[] = $employee;
        return $this;
    }
}
