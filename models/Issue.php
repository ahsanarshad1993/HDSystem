<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issue".
 *
 * @property integer $issue_id
 * @property string $title
 * @property string $description
 * @property integer $engineer_id
 * @property integer $subcategory_id
 * @property string $create_time
 * @property integer $urgency_id
 * @property string $attachment
 * @property integer $user_id
 *
 * @property Activity[] $activities
 * @property Engineer $engineer
 * @property Subcategory $subcategory
 * @property Urgency $urgency
 * @property User $user
 */
class Issue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['engineer_id', 'subcategory_id', 'urgency_id', 'user_id'], 'required'],
            [['engineer_id', 'subcategory_id', 'urgency_id', 'user_id'], 'integer'],
            [['create_time'], 'safe'],
            [['title', 'description', 'attachment'], 'string', 'max' => 45],
            [['engineer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Engineer::className(), 'targetAttribute' => ['engineer_id' => 'engineer_id']],
            [['subcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategory::className(), 'targetAttribute' => ['subcategory_id' => 'subcategory_id']],
            [['urgency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Urgency::className(), 'targetAttribute' => ['urgency_id' => 'urgency_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'issue_id' => Yii::t('app', 'Issue ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'engineer_id' => Yii::t('app', 'Engineer ID'),
            'subcategory_id' => Yii::t('app', 'Subcategory ID'),
            'create_time' => Yii::t('app', 'Create Time'),
            'urgency_id' => Yii::t('app', 'Urgency ID'),
            'attachment' => Yii::t('app', 'Attachment'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['issue_id' => 'issue_id', 'issue_engineer_id' => 'engineer_id', 'issue_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEngineer()
    {
        return $this->hasOne(Engineer::className(), ['engineer_id' => 'engineer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategory()
    {
        return $this->hasOne(Subcategory::className(), ['subcategory_id' => 'subcategory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUrgency()
    {
        return $this->hasOne(Urgency::className(), ['urgency_id' => 'urgency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
