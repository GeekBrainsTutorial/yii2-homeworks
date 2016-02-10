<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Access]].
 *
 * @see \app\models\Access
 */
class AccessQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    public function withGuest($id_guest)
    {
        return $this->andWhere(
            'user_gest = :id_guest',
            [':id_guest' => $id_guest]
        );
    }

    public function withDate($date)
    {
        return $this->andWhere(
            'date = :date',
            [':date' => $date]
        );
    }

    /**
     * @inheritdoc
     * @return \app\models\Access[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Access|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}