<?php

namespace haqqi\metronic\models;

use Yii;

/**
 * This is the model class for table "crop".
 *
 * @property string $id
 * @property string $name
 * @property integer $stage
 * @property string $season
 * @property integer $regrow
 *
 * @property Plant[] $plants
 * @property Stage[] $stages
 */
class Crop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'stage', 'season'], 'required'],
            [['stage', 'regrow'], 'integer'],
            [['name', 'season'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'stage' => 'Stage',
            'season' => 'Season',
            'regrow' => 'Regrow',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlants()
    {
        return $this->hasMany(Plant::className(), ['cropId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStages()
    {
        return $this->hasMany(Stage::className(), ['cropId' => 'id']);
    }
}
