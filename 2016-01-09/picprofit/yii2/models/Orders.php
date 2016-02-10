<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $create_date
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['create_date'], 'safe'],
            [['name', 'address', 'email', 'phone'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\query\OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\OrdersQuery(get_called_class());
    }
}
