<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string|null $text
 * @property int|null $from_employee_id
 * @property int|null $to_emoloyee_id
 *
 * @property Employee $fromEmployee
 * @property Employee $toEmoloyee
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['to_emoloyee_id'], 'integer'],
            [['text'], 'string', 'max' => 255],
            // [['from_employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['from_employee_id' => 'id']],
            // [['to_emoloyee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['to_emoloyee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст заявки',
            'from_employee_id' => 'Кому',
            'to_emoloyee_id' => 'От кого',
        ];
    }

    /**
     * Gets query for [[FromEmployee]].
     *
     * @return \yii\db\ActiveQuery|EmployeeQuery
     */
    public function getFromEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'from_employee_id']);
    }

    /**
     * Gets query for [[ToEmoloyee]].
     *
     * @return \yii\db\ActiveQuery|EmployeeQuery
     */
    public function getToEmoloyee()
    {
        return $this->hasOne(Employee::class, ['id' => 'to_emoloyee_id']);
    }

    /**
     * {@inheritdoc}
     * @return RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }
}
