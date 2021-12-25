<?php

namespace frontend\modules\vacancy\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\vacancy\models\Vacancy;


/**
 * VacancySearch represents the model behind the search form of `frontend\modules\vacancy\models\Vacancy`.
 */
class VacancySearch extends Vacancy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'profession_id', 'city_id', 'employment_id', 'education_id', 'practice', 'payment', 'vacancy_created_at', 'category_id'], 'integer'],
            [['company', 'vacancy_description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Vacancy::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'profession_id' => $this->profession_id,
            'city_id' => $this->city_id,
            'employment_id' => $this->employment_id,
            'education_id' => $this->education_id,
            'practice' => $this->practice,
            'payment' => $this->payment,
            'vacancy_created_at' => $this->vacancy_created_at,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'vacancy_description', $this->vacancy_description]);

        return $dataProvider;
    }
    
    public static function getProfessionList() {
        $sql = "SELECT * FROM profession";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return \yii\helpers\ArrayHelper::map($result, 'id', 'name');
        //return \yii\helpers\ArrayHelper::map(\app\models\Profession::find()->all(), 'id', 'name');
    }
    
    public function getEmploymentList() {
        $sql = "SELECT * FROM employment";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return \yii\helpers\ArrayHelper::map($result, 'id', 'name');
    }
    
    public function getCityList() {
        $sql = "SELECT * FROM city";
        $result = \Yii::$app->db->createCommand($sql)->queryAll();
        return \yii\helpers\ArrayHelper::map($result, 'id', 'name');
    }
}
