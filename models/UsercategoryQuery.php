<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Usercategory]].
 *
 * @see Usercategory
 */
class UsercategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Usercategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Usercategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
