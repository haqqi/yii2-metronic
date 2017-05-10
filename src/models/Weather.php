<?php

namespace haqqi\metronic\models;

use Yii;

/**
 * This is the model class for table "weather".
 *
 * @property string $id
 * @property string $name
 * @property integer $sun
 * @property integer $water
 *
 * @property Day[] $days
 */
class Weather extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weather';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sun', 'water'], 'required'],
            [['sun', 'water'], 'integer'],
            [['name'], 'string', 'max' => 40],
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
            'sun' => 'Sun',
            'water' => 'Water',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDays()
    {
        return $this->hasMany(Day::className(), ['weatherId' => 'id']);
    }
}
