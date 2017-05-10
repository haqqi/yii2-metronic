<?php

namespace haqqi\metronic\models;

use Yii;

/**
 * This is the model class for table "day".
 *
 * @property string $id
 * @property integer $number
 * @property string $weatherId
 *
 * @property Weather $weather
 * @property PlantRecord[] $plantRecords
 */
class Day extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'weatherId'], 'required'],
            [['number', 'weatherId'], 'integer'],
            [['weatherId'], 'exist', 'skipOnError' => true, 'targetClass' => Weather::className(), 'targetAttribute' => ['weatherId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'weatherId' => 'Weather ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeather()
    {
        return $this->hasOne(Weather::className(), ['id' => 'weatherId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlantRecords()
    {
        return $this->hasMany(PlantRecord::className(), ['dayId' => 'id']);
    }
}
