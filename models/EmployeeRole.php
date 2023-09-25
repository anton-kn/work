<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee_role".
 *
 * @property int $id
 * @property string $name
 *
 * @property Employee[] $employees
 */
class EmployeeRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery|EmployeeQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::class, ['employee_role_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return EmployeeRoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeRoleQuery(get_called_class());
    }
}
