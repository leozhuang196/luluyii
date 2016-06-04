<?php
namespace modules\user\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modules\user\models\Visit;

class VisitSearch extends Visit{
    public function rules()
    {
        return [
            [['id', ], 'integer'],
            [['visit_ip','visit_time'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Visit::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        //我们搜索输入框中输入的格式一般是 2016-01-01 而非时间戳
        //输出2016-01-01无非是想搜索这一天的数据，因此代码如下
        if ($this->visit_time) {
            $visitAt = strtotime($this->visit_time);
            $visitAtEnd = $visitAt + 24*3600;
            $query->andWhere("visit_time >= {$visitAt} AND visit_time <= {$visitAtEnd}");
        }
        $query->andFilterWhere(['like', 'visit_ip', $this->visit_ip]);
        return $dataProvider;
    }
}
