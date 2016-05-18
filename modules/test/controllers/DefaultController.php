<?php

namespace modules\test\controllers;

use yii\web\Controller;
use modules\test\models\Test;
use yii\web\UploadedFile;
use modules\user\models\User;
use modules\post\models\Post;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $model = new Test();
        if ($model->load(\Yii::$app->request->post())) {
            //getInstance()实力化对象
            $image = UploadedFile::getInstance($model, 'file');
            $randName = time().'.'.$image->getExtension();
            $rootPath = 'images/'.date('Y',time()).'/';
            if (!file_exists($rootPath)) {
                mkdir($rootPath);
            }
            $image->saveAs($rootPath . $randName);
        }
        return $this->render('index',['model'=> $model]);
    }
    
    public function actionDatePicker()
    {
        return $this->render('datePicker');
    }
    
    public function actionGetZeroTime()
    {
        //mktime() 函数返回一个日期的 Unix 时间戳
        $a =mktime(0,0,0,date('m'),date('d'),date('Y'));
        //返回的是00:05:00？？
        return date('Y-m-d H:m:s',$a);
    }
    
    public function actionCache()
    {
        $cache = \Yii::$app->cache;
        $data = $cache->get('cache_data_key');
        if ($data === false) {
            //这里我们可以操作数据库获取数据，然后通过$cache->set方法进行缓存
            $cacheData = User::findOne(['id'=>\Yii::$app->user->id]);
            //set方法的第一个参数是我们的数据对应的key值，方便我们获取到
            //第二个参数即是我们要缓存的数据
            //第三个参数是缓存时间，如果是0，意味着永久缓存。默认是0
            $cache->set('cache_data_key', $cacheData, 60*60);
        }
        var_dump($data->username);
    }
    
    public function actionTest()
    {
        return $this->render('index');
    }
}
