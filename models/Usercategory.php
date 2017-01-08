<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usercategory".
 *
 * @property integer $user_category_id
 * @property string $name
 *
 * @property User[] $users
 */
class Usercategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usercategory';
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
            'user_category_id' => 'User Category ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_category_id' => 'user_category_id']);
    }

    /**
     * @inheritdoc
     * @return UsercategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsercategoryQuery(get_called_class());
    }
}
