<?php

namespace haqqi\metronic\models;

use Yii;

/**
 * This is the model class for table "stage".
 *
 * @property string $id
 * @property string $cropId
 * @property integer $number
 * @property integer $sunMin
 * @property integer $sunMax
 * @property integer $waterMin
 * @property integer $waterMax
 * @property integer $days
 *
 * @property Crop $crop
 */
class Stage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cropId', 'number', 'sunMin', 'sunMax', 'waterMin', 'waterMax', 'days'], 'required'],
            [['cropId', 'number', 'sunMin', 'sunMax', 'waterMin', 'waterMax', 'days'], 'integer'],
            [['cropId', 'number'], 'unique', 'targetAttribute' => ['cropId', 'number'], 'message' => 'The combination of Crop ID and Number has already been taken.'],
            [['cropId'], 'exist', 'skipOnError' => true, 'targetClass' => Crop::className(), 'targetAttribute' => ['cropId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cropId' => 'Crop ID',
            'number' => 'Number',
            'sunMin' => 'Sun Min',
            'sunMax' => 'Sun Max',
            'waterMin' => 'Water Min',
            'waterMax' => 'Water Max',
            'days' => 'Days',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrop()
    {
        return $this->hasOne(Crop::className(), ['id' => 'cropId']);
    }
}
