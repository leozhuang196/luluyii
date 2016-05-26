<?php
namespace modules\shop\controllers;
use app\controllers\FrontController;

class DefaultController extends FrontController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
