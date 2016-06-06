<?php
namespace app\controllers;

use app\controllers\FrontController;

class OfflineController extends FrontController
{    
    public function actionIndex($param1,$param2)
    {
        return $this->render('index',['param1'=>$param1,'param2'=>$param2]);
    }
}
?>