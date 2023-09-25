<?php

namespace app\Entity;

/**
 * Сотрудник
 */
class Employee
{

    /**
     * id сотрудника
     * @var integer
     */
    private $id;

    /**
     * id роли
     * @var integer
     */
    private $idRole;
    /**
     * Наименование роли
     * @var string
     */
    private $nameRole;

    /**
     * ФИО
     * @var string
     */
    private $fio;


    /**
     * Эл. почта
     * @var string
     */
    private $email;

    /**
     * Алиас 
     * @var string
     */
    private $alias;

    /**
     * id сотрудника
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * id сотрудника
     * @param integer $id id сотрудника
     * @return Employee
     */
    public function setId($id): Employee
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Наименование роли
     * @return string
     */
    public function getNameRole()
    {
        return $this->nameRole;
    }

    /**
     * Наименование роли
     * @param string $nameRole Наименование роли
     * @return Employee
     */
    public function setNameRole($nameRole): Employee
    {
        $this->nameRole = $nameRole;
        return $this;
    }

    /**
     * Эл. почта
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Эл. почта
     * @param string $email Эл. почта
     * @return Employee
     */
    public function setEmail($email): Employee
    {
        $this->email = $email;
        return $this;
    }

    /**
     * ФИО
     * @return string
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * ФИО
     * @param string $fio ФИО
     * @return Employee
     */
    public function setFio($fio): Employee
    {
        $this->fio = $fio;
        return $this;
    }

    /**
     * Алиас
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Алиас
     * @param string $alias Алиас
     * @return Employee
     */
    public function setAlias($alias): Employee
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * Массив данных
     * @param array $row
     * @return Employee
     */
    public function fromArray(array $row): Employee
    {
        if (isset($row['id'])) {
            $this->id = $row['id'];
        }
        if (isset($row['fio'])) {
            $this->fio = $row['fio'];
        }
        if (isset($row['email'])) {
            $this->email = $row['email'];
        }
        if (isset($row['name'])) {
            $this->nameRole = $row['name'];
        }

        return $this;
    }

    /**
     * id роли
     * @return integer
     */
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * id роли
     * @param integer $idRole id роли
     * @return self
     */
    public function setIdRole($idRole): self
    {
        $this->idRole = $idRole;
        return $this;
    }
}
