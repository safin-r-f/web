<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Categories]].
 *
 * @see Categories
 */
class CategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/
    public function byEmail($email)
    {
        return $this ->andWhere(['email' => $email]);
    }
    /**
     * @inheritdoc
     * @return Categories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Categories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
