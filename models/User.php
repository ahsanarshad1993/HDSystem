<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $company
 * @property string $designation
 * @property integer $parent_p_no
 * @property string $parent_company
 * @property integer $host_p_no
 * @property string $host_company
 * @property integer $user_category_id
 *
 * @property Issue[] $issues
 * @property Usercategory $userCategory
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'user_category_id'], 'required'],
            [['parent_p_no', 'host_p_no', 'user_category_id'], 'integer'],
            [['name', 'company', 'designation', 'parent_company', 'host_company'], 'string', 'max' => 45],
            [['user_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usercategory::className(), 'targetAttribute' => ['user_category_id' => 'user_category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'name' => 'Name',
            'company' => 'Company',
            'designation' => 'Designation',
            'parent_p_no' => 'Parent P No',
            'parent_company' => 'Parent Company',
            'host_p_no' => 'Host P No',
            'host_company' => 'Host Company',
            'user_category_id' => 'User Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssues()
    {
        return $this->hasMany(Issue::className(), ['user_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCategory()
    {
        return $this->hasOne(Usercategory::className(), ['user_category_id' => 'user_category_id']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
