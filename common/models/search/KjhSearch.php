<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kjh;

/**
 * KjhSearch represents the model behind the search form about `common\models\Kjh`.
 */
class KjhSearch extends Kjh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qh', 'bai', 'shi', 'ge'], 'integer'],
        ];
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
        $query = Kjh::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'qh' => $this->qh,
            'bai' => $this->bai,
            'shi' => $this->shi,
            'ge' => $this->ge,
        ]);

        return $dataProvider;
    }
}
