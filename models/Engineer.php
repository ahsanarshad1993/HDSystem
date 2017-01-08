<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "engineer".
 *
 * @property integer $engineer_id
 * @property string $name
 * @property integer $hd_designation_id
 *
 * @property HdDesignation $hdDesignation
 * @property Issue[] $issues
 */
class Engineer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'engineer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hd_designation_id'], 'required'],
            [['hd_designation_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['hd_designation_id'], 'exist', 'skipOnError' => true, 'targetClass' => HdDesignation::className(), 'targetAttribute' => ['hd_designation_id' => 'hd_designation_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'engineer_id' => 'Engineer ID',
            'name' => 'Name',
            'hd_designation_id' => 'Hd Designation ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHdDesignation()
    {
        return $this->hasOne(HdDesignation::className(), ['hd_designation_id' => 'hd_designation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssues()
    {
        return $this->hasMany(Issue::className(), ['engineer_id' => 'engineer_id']);
    }

    /**
     * @inheritdoc
     * @return EngineerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EngineerQuery(get_called_class());
    }
}
