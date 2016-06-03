<?php
namespace modules\test\controllers;
use app\controllers\FrontController;

class TestController extends FrontController
{
    public function actionTest()
    {
        return $this->render('test');
    }
}