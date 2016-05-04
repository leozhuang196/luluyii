<?php

namespace modules\user\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use modules\user\models\User;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['id', 'role', 'status', 'created_at', 'updated_at', 'confirmed_at', 'blocked_at', 'flags'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'unconfirmed_email', 'registration_ip'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'confirmed_at' => $this->confirmed_at,
            'blocked_at' => $this->blocked_at,
            'flags' => $this->flags,
        ]);
        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'unconfirmed_email', $this->unconfirmed_email])
            ->andFilterWhere(['like', 'registration_ip', $this->registration_ip]);
        return $dataProvider;
    }
}
