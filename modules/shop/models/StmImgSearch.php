<?php
namespace modules\shop\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modules\shop\models\StmImg;

class StmImgSearch extends StmImg
{
    public function rules()
    {
        return [
            [['id', 'stm_id'], 'integer'],
            [['pic', 'title'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = StmImg::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'stm_id' => $this->stm_id,
        ]);
        $query->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'title', $this->title]);
        return $dataProvider;
    }
}
