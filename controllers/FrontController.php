<?php
namespace app\controllers;
use yii\web\Controller;

class FrontController extends Controller
{
    //默认的操作
    //public $defaultAction = 'index';

    public function init()
    {
        parent::init();
        $this->layout='@themes/basic/layouts/main_front.php';
    }
}