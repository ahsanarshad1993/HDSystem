<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hddesignation".
 *
 * @property integer $hd_designation_id
 * @property string $name
 *
 * @property Engineer[] $engineers
 */
class Hddesignation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hddesignation';
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
     * @return HddesignationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HddesignationQuery(get_called_class());
    }
}
