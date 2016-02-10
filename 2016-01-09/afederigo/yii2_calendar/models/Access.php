<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_access".
 *
 * @property integer $id
 * @property integer $user_owner
 * @property integer $user_gest
 * @property string $date
 */
class Access extends \yii\db\ActiveRecord
{
    const ACCESS_CREATOR =1;
    const ACCESS_GUEST =2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_owner', 'user_gest'], 'required'],
            [['user_owner', 'user_gest'], 'integer'],
            [['date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_owner' => Yii::t('app', 'User Owner'),
            'user_gest' => Yii::t('app', 'User Guest'),
            'planCreator' => Yii::t('app', 'Plan Creator'),
            'plansCount' => Yii::t('app', 'Plans Count'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @param $model
     * @return bool|int
     */
    public static function checkAccess($model){
        if($model->creator == Yii::$app->user->id)
            return self::ACCESS_CREATOR;
        $accessCalendar = self::find()
            ->withDate($model->date_event)
            ->withGuest(Yii::$app->user->id)
            ->exists();
        if($accessCalendar)
            return self::ACCESS_GUEST;
        return false;
    }

    public function getOwner(){
        return $this->hasOne(User::className(), ['id' => 'user_owner']);
    }

    public function getGuest(){
        return $this->hasOne(User::className(), ['id' => 'user_gest']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\AccessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AccessQuery(get_called_class());
    }
}
