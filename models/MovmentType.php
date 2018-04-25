<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movment_type".
 *
 * @property int $id
 * @property string $description
 *
 * @property Movment[] $movments
 */
class MovmentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movment_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovments()
    {
        return $this->hasMany(Movment::className(), ['movment_type_id' => 'id']);
    }
}
