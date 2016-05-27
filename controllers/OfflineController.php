<?php
namespace app\controllers;
use yii\web\Controller;

class OfflineController extends Controller
{    
    public function actionIndex($param1,$param2)
    {
        echo '网站正在'.$param1.$param2;
    }
}
?>