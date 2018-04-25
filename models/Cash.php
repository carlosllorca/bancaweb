<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cash".
 *
 * @property int $id
 * @property int $money_dispencer_id
 * @property int $money_id
 * @property int $count
 *
 * @property MoneyDispencer $moneyDispencer
 * @property Money $money
 * @property ExtractedCash[] $extractedCashes
 */
class Cash extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cash';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['money_dispencer_id', 'money_id', 'count'], 'required'],
            [['money_dispencer_id', 'money_id', 'count'], 'integer'],
            [['money_dispencer_id'], 'exist', 'skipOnError' => true, 'targetClass' => MoneyDispencer::className(), 'targetAttribute' => ['money_dispencer_id' => 'id']],
            [['money_id'], 'exist', 'skipOnError' => true, 'targetClass' => Money::className(), 'targetAttribute' => ['money_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'money_dispencer_id' => 'Money Dispencer ID',
            'money_id' => 'Money ID',
            'count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoneyDispencer()
    {
        return $this->hasOne(MoneyDispencer::className(), ['id' => 'money_dispencer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoney()
    {
        return $this->hasOne(Money::className(), ['id' => 'money_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExtractedCashes()
    {
        return $this->hasMany(ExtractedCash::className(), ['cash_id' => 'id']);
    }
}
