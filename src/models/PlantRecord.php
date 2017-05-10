<?php

namespace haqqi\metronic\models;

use Yii;

/**
 * This is the model class for table "plant_record".
 *
 * @property string $id
 * @property string $plantId
 * @property string $dayId
 * @property integer $watercan
 * @property integer $harvest
 *
 * @property Day $day
 * @property Plant $plant
 */
class PlantRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plant_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plantId', 'dayId'], 'required'],
            [['plantId', 'dayId', 'watercan', 'harvest'], 'integer'],
            [['dayId'], 'exist', 'skipOnError' => true, 'targetClass' => Day::className(), 'targetAttribute' => ['dayId' => 'id']],
            [['plantId'], 'exist', 'skipOnError' => true, 'targetClass' => Plant::className(), 'targetAttribute' => ['plantId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plantId' => 'Plant ID',
            'dayId' => 'Day ID',
            'watercan' => 'Watercan',
            'harvest' => 'Harvest',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDay()
    {
        return $this->hasOne(Day::className(), ['id' => 'dayId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlant()
    {
        return $this->hasOne(Plant::className(), ['id' => 'plantId']);
    }
}
