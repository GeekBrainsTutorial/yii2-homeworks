<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%clndr_calendar}}".
 *
 * @property integer $id
 * @property string $text
 * @property integer $creator
 * @property string $date_event
 *
 * @property ClndrUser $creator0
 *
 * @property Access @access
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%clndr_calendar}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'creator'], 'string'],
            [['creator'], 'integer'],
            [['date_event'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'text' => Yii::t('app', 'Text'),
            'creator' => Yii::t('app', 'Creator'),
            'date_event' => Yii::t('app', 'Date Event'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(ClndrUser::className(), ['id' => 'creator']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\CalendarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CalendarQuery(get_called_class());
    }

    /**
     * Before save event handler
     * @param bool $insert
     * @return bool
     */
    public function beforeSave ($insert)
    {
            if ($this->getIsNewRecord())
            {
                $this->creator = Yii::$app->user->id;
            }
            return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccess()
    {
        return $this->hasMany(Access::className(), ['date' => 'date_event']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'creator']);
    }
}
