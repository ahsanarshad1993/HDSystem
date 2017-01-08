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
 * @property integer $user_user_id
 *
 * @property Activity[] $activities
 * @property Engineer $engineer
 * @property Subcategory $subcategory
 * @property Urgency $urgency
 * @property User $userUser
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
            [['engineer_id', 'subcategory_id', 'urgency_id', 'user_user_id'], 'required'],
            [['engineer_id', 'subcategory_id', 'urgency_id', 'user_user_id'], 'integer'],
            [['create_time'], 'safe'],
            [['title', 'description', 'attachment'], 'string', 'max' => 45],
            [['engineer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Engineer::className(), 'targetAttribute' => ['engineer_id' => 'engineer_id']],
            [['subcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategory::className(), 'targetAttribute' => ['subcategory_id' => 'subcategory_id']],
            [['urgency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Urgency::className(), 'targetAttribute' => ['urgency_id' => 'urgency_id']],
            [['user_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'issue_id' => 'Issue ID',
            'title' => 'Title',
            'description' => 'Description',
            'engineer_id' => 'Engineer ID',
            'subcategory_id' => 'Subcategory ID',
            'create_time' => 'Create Time',
            'urgency_id' => 'Urgency ID',
            'attachment' => 'Attachment',
            'user_user_id' => 'User User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['issue_id' => 'issue_id', 'issue_engineer_id' => 'engineer_id', 'issue_user_id' => 'user_user_id']);
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
    public function getUserUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_user_id']);
    }

    /**
     * @inheritdoc
     * @return IssueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IssueQuery(get_called_class());
    }
}
