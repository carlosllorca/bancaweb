<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "money".
 *
 * @property int $id
 * @property int $currency_value
 * @property int $serial_number
 * @property int $year
 *
 * @property Cash[] $cashes
 */
class Money extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_value', 'serial_number', 'year'], 'required'],
            [['currency_value', 'serial_number', 'year'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency_value' => 'Currency Value',
            'serial_number' => 'Serial Number',
            'year' => 'Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashes()
    {
        return $this->hasMany(Cash::className(), ['money_id' => 'id']);
    }
}
