<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $fio
 * @property string $email
 * @property int|null $employee_role_id
 *
 * @property EmployeeRole $employeeRole
 * @property Request[] $requests
 * @property Request[] $requests0
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'email', 'employee_role_id'], 'required'],
            [['employee_role_id'], 'integer'],
            [['fio', 'email'], 'string', 'max' => 255],
            [['employee_role_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmployeeRole::class, 'targetAttribute' => ['employee_role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'email' => 'Email',
            'employee_role_id' => 'Роль',
        ];
    }

    /**
     * Gets query for [[EmployeeRole]].
     *
     * @return \yii\db\ActiveQuery|EmployeeRoleQuery
     */
    public function getEmployeeRole()
    {
        return $this->hasOne(EmployeeRole::class, ['id' => 'employee_role_id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery|RequestQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::class, ['from_employee_id' => 'id']);
    }

    /**
     * Gets query for [[Requests0]].
     *
     * @return \yii\db\ActiveQuery|RequestQuery
     */
    public function getRequests0()
    {
        return $this->hasMany(Request::class, ['to_emoloyee_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeQuery(get_called_class());
    }
}
