<?php
namespace modules\shop\models;
use gilek\gtreetable\models\TreeModel;

class Category extends TreeModel
{
    public static function tableName()
    {
        return '{{%shop_category}}';
    }
    
    public static function getCategoriesByLevel($level){
        return static::findAll(['level'=>$level]);
    }
}