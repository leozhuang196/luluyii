<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class BackController extends Controller
{
   public function init()
   {
       parent::init();
       $this->layout='@themes/basic/layouts/main_back.php';
   }
   
   public function behaviors()
   {
       return [
           'verbs' => [
               'class' => VerbFilter::className(),
               'actions' => [
                   'delete' => ['post'],
               ],
           ],
           'access' => [
               'class' => AccessControl::className(),
               'rules' => [
                   [
                       'allow' => true,
                       'roles' => ['@'],
                       'matchCallback' => function () {
                           return in_array(Yii::$app->user->identity->username, Yii::$app->params['adminName']);
                       },
                   ]
               ],
           ],
       ];
   }
}