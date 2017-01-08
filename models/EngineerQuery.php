<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Engineer]].
 *
 * @see Engineer
 */
class EngineerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Engineer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Engineer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
