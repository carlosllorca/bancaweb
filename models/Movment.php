<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movment".
 *
 * @property int $id
 * @property int $movment_type_id
 * @property int $from_debit_card_id
 * @property double $ammount
 * @property int $to_debit_card_id
 * @property string $date_time
 *
 * @property ExtractedCash[] $extractedCashes
 * @property DebitCard $fromDebitCard
 * @property DebitCard $toDebitCard
 * @property MovmentType $movmentType
 */
class Movment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['movment_type_id', 'ammount', 'to_debit_card_id'], 'required'],
            [['movment_type_id', 'from_debit_card_id', 'to_debit_card_id'], 'integer'],
            [['ammount'], 'number'],
            [['date_time'], 'safe'],
            [['from_debit_card_id'], 'exist', 'skipOnError' => true, 'targetClass' => DebitCard::className(), 'targetAttribute' => ['from_debit_card_id' => 'id']],
            [['to_debit_card_id'], 'exist', 'skipOnError' => true, 'targetClass' => DebitCard::className(), 'targetAttribute' => ['to_debit_card_id' => 'id']],
            [['movment_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MovmentType::className(), 'targetAttribute' => ['movment_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'movment_type_id' => 'Movment Type ID',
            'from_debit_card_id' => 'From Debit Card ID',
            'ammount' => 'Ammount',
            'to_debit_card_id' => 'To Debit Card ID',
            'date_time' => 'Date Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExtractedCashes()
    {
        return $this->hasMany(ExtractedCash::className(), ['movment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromDebitCard()
    {
        return $this->hasOne(DebitCard::className(), ['id' => 'from_debit_card_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToDebitCard()
    {
        return $this->hasOne(DebitCard::className(), ['id' => 'to_debit_card_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovmentType()
    {
        return $this->hasOne(MovmentType::className(), ['id' => 'movment_type_id']);
    }
}
