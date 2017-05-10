<?php

namespace haqqi\metronic\models;

use Yii;

/**
 * This is the model class for table "plant".
 *
 * @property string $id
 * @property string $cropId
 * @property string $name
 *
 * @property Crop $crop
 * @property PlantRecord[] $plantRecords
 */
class Plant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cropId', 'name'], 'required'],
            [['cropId'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrop()
    {
        return $this->hasOne(Crop::className(), ['id' => 'cropId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlantRecords()
    {
        return $this->hasMany(PlantRecord::className(), ['plantId' => 'id']);
    }
}
