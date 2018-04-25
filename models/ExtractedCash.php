<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "extracted_cash".
 *
 * @property int $id
 * @property int $cash_id
 * @property int $movment_id
 * @property int $count
 *
 * @property Cash $cash
 * @property Movment $movment
 */
class ExtractedCash extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'extracted_cash';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cash_id', 'movment_id', 'count'], 'required'],
            [['cash_id', 'movment_id', 'count'], 'integer'],
            [['cash_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cash::className(), 'targetAttribute' => ['cash_id' => 'id']],
            [['movment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movment::className(), 'targetAttribute' => ['movment_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cash_id' => 'Cash ID',
            'movment_id' => 'Movment ID',
            'count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCash()
    {
        return $this->hasOne(Cash::className(), ['id' => 'cash_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovment()
    {
        return $this->hasOne(Movment::className(), ['id' => 'movment_id']);
    }
}
