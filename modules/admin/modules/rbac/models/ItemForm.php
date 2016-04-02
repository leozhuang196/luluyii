<?php

namespace app\modules\admin\modules\rbac\models;

use Yii;

class ItemForm extends \yii\base\Model
{
    public $isNewRecord;
    public $child;

    public $name;
    public $type;
    public $description;
    public $rule_name;
    public $data;

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['child'],'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}