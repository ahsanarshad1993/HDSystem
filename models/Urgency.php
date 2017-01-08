<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "urgency".
 *
 * @property integer $urgency_id
 * @property string $name
 *
 * @property Issue[] $issues
 */
class Urgency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'urgency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'urgency_id' => 'Urgency ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssues()
    {
        return $this->hasMany(Issue::className(), ['urgency_id' => 'urgency_id']);
    }

    /**
     * @inheritdoc
     * @return UrgencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UrgencyQuery(get_called_class());
    }
}
