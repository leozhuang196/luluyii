<?php

namespace modules\test\controllers;

use yii\web\Controller;
use modules\test\models\Test;
use yii\web\UploadedFile;

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
}
