<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hd_designation".
 *
 * @property integer $hd_designation_id
 * @property string $name
 *
 * @property Engineer[] $engineers
 */
class HdDesignation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hd_designation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hd_designation_id' => 'Hd Designation ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEngineers()
    {
        return $this->hasMany(Engineer::className(), ['hd_designation_id' => 'hd_designation_id']);
    }

    /**
     * @inheritdoc
     * @return HdDesignationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HdDesignationQuery(get_called_class());
    }
}
