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
            'name' => '角色/权限',
            'type' => '类型',
            'description' => '描述',
            'rule_name' => '规则名',
            'data' => 'Data',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}