<?php
namespace modules\shop\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modules\shop\models\Stm;

class StmSearch extends Stm
{
    public function rules()
    {
        return [
            [['id', 'is_use', 'stm_type'], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Stm::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'is_use' => $this->is_use,
            'stm_type' => $this->stm_type,
        ]);
        return $dataProvider;
    }
}
