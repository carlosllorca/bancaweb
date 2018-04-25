<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "debit_card".
 *
 * @property int $id
 * @property string $deposit_number
 * @property string $account_number
 * @property int $pin
 * @property int $client_id
 * @property int $allow_cuc
 * @property double $cuc_balance
 * @property int $allow_mn
 * @property int $mn_balance
 *
 * @property Client $client
 * @property Movment[] $movments
 * @property Movment[] $movments0
 */
class DebitCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'debit_card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deposit_number', 'account_number', 'pin', 'client_id', 'allow_cuc', 'cuc_balance', 'mn_balance'], 'required'],
            [['pin', 'client_id', 'mn_balance'], 'integer'],
            [['cuc_balance'], 'number'],
            [['deposit_number', 'account_number'], 'string', 'max' => 50],
            [['allow_cuc', 'allow_mn'], 'string', 'max' => 1],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deposit_number' => 'Deposit Number',
            'account_number' => 'Account Number',
            'pin' => 'Pin',
            'client_id' => 'Client ID',
            'allow_cuc' => 'Allow Cuc',
            'cuc_balance' => 'Cuc Balance',
            'allow_mn' => 'Allow Mn',
            'mn_balance' => 'Mn Balance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovments()
    {
        return $this->hasMany(Movment::className(), ['from_debit_card_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovments0()
    {
        return $this->hasMany(Movment::className(), ['to_debit_card_id' => 'id']);
    }
}
