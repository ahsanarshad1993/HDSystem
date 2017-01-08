<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property integer $activity_id
 * @property string $current_time
 * @property string $description
 * @property integer $status_id
 * @property string $attachment
 * @property integer $issue_id
 * @property integer $issue_engineer_id
 * @property integer $issue_user_id
 *
 * @property Issue $issue
 * @property Status $status
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['current_time'], 'safe'],
            [['status_id', 'issue_id', 'issue_engineer_id', 'issue_user_id'], 'required'],
            [['status_id', 'issue_id', 'issue_engineer_id', 'issue_user_id'], 'integer'],
            [['description', 'attachment'], 'string', 'max' => 45],
            [['issue_id', 'issue_engineer_id', 'issue_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Issue::className(), 'targetAttribute' => ['issue_id' => 'issue_id', 'issue_engineer_id' => 'engineer_id', 'issue_user_id' => 'user_user_id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'status_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Activity ID',
            'current_time' => 'Current Time',
            'description' => 'Description',
            'status_id' => 'Status ID',
            'attachment' => 'Attachment',
            'issue_id' => 'Issue ID',
            'issue_engineer_id' => 'Issue Engineer ID',
            'issue_user_id' => 'Issue User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssue()
    {
        return $this->hasOne(Issue::className(), ['issue_id' => 'issue_id', 'engineer_id' => 'issue_engineer_id', 'user_user_id' => 'issue_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['status_id' => 'status_id']);
    }

    /**
     * @inheritdoc
     * @return ActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActivityQuery(get_called_class());
    }
}
