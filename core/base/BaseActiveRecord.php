<?php
namespace app\core\base;
use yii\db\ActiveRecord;

class BaseActiveRecord extends ActiveRecord{

    public static function findOne($where=null,$orderby=null){
        $query = static::find();
        if($where!=null){
            $query->andWhere($where);
        }
        if($orderby!=null){
            $query->orderBy($orderby);
        }
        return $query->one();
    }

    public static function findAll($where=null,$orderby=null,$limit=null){
        $query = static::find();
        if($where!=null){
            $query->andWhere($where);
        }
        if($orderby!=null){
            $query->orderBy($orderby);
        }
        if($limit!=null){
            $query->limit($limit);
        }
        return $query->all();
    }
}
?>