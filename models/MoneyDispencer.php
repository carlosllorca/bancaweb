<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "money_dispencer".
 *
 * @property int $id
 * @property string $coord_x
 * @property string $coord_y
 * @property string $serial_number
 * @property int $status_id
 *
 * @property Cash[] $cashes
 * @property Status $status
 */
class MoneyDispencer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money_dispencer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coord_x', 'coord_y', 'serial_number', 'status_id'], 'required'],
            [['coord_x', 'coord_y'], 'number'],
            [['status_id'], 'integer'],
            [['serial_number'], 'string', 'max' => 15],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'coord_x' => 'Coord X',
            'coord_y' => 'Coord Y',
            'serial_number' => 'Serial Number',
            'status_id' => 'Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashes()
    {
        return $this->hasMany(Cash::className(), ['money_dispencer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
}
