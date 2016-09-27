<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Adv]].
 *
 * @see Adv
 */
class AdvQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Adv[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Adv|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
