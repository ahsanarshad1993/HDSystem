<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Hddesignation]].
 *
 * @see Hddesignation
 */
class HddesignationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Hddesignation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Hddesignation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
