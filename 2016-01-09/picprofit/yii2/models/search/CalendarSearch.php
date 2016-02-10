<?php

namespace app\models\search;

use app\models\Access;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calendar;

/**
 * CalendarSearch represents the model behind the search form about `app\models\Calendar`.
 */
class CalendarSearch extends Calendar
{
    public $access;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'creator'], 'integer'],
            [['text', 'date_event'], 'safe'],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['access']);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Calendar::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith(['access']);

        $dataProvider->sort->attributes['access'] = [
            'asc' => ['clndr_access.user_id' => SORT_ASC],
            'desc' => ['clndr_access.user_id' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'clndr_calendar.id' => $this->id,
            'clndr_calendar.creator' => $this->creator,
            'clndr_access.user_guest' => $this->access['user_id'],
        ]);

        $query->andWhere('clndr_access.date = date(' .
            $this->access['date'] . ')'
        );

        $query->andWhere('date(clndr_calendar.date_event) = date(' .
            $this->access['date'] . ')'
        );

        $query->andFilterWhere(['like', 'clndr_calendar.text', $this->text]);
//VAR_DUMP($query->createCommand()->getRawSql());
        return $dataProvider;
    }

    public function actionMynotes()
    {

    }
}
