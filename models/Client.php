<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $full_name
 * @property string $ci
 * @property string $work
 * @property string $address
 *
 * @property DebitCard[] $debitCards
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'ci', 'work', 'address'], 'required'],
            [['address'], 'string'],
            [['full_name', 'work'], 'string', 'max' => 150],
            [['ci'], 'string', 'max' => 11],
            [['ci'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'ci' => 'Ci',
            'work' => 'Work',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDebitCards()
    {
        return $this->hasMany(DebitCard::className(), ['client_id' => 'id']);
    }
}
