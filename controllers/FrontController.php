<?php
namespace app\controllers;
use yii\web\Controller;

class FrontController extends Controller
{
   public function init()
   {
       parent::init();
       $this->layout='@themes/basic/layouts/main_front.php';
   }
}