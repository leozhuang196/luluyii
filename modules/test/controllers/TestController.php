<?php
namespace modules\test\controllers;

use app\controllers\FrontController;

class TestController extends FrontController
{
    public function actionTest()
    {
        $test = \Yii::$app->ip->test();
        var_dump($test);
        $location = \Yii::$app->ip->getlocation("14.216.10.221");
        var_dump($location);
        exit();
        return $this->render('test');
    }
}