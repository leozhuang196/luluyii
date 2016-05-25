<?php
namespace modules\shop\controllers;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function init()
    {
        parent::init();
        $this->layout = '@themes/basic/layouts/main.php';
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}
