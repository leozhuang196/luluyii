<?php
namespace modules\user\controllers;

use Yii;
use modules\user\models\VisitSearch;
use app\controllers\BackController;

class VisitController extends BackController
{
    public function actionIndex()
    {
        $searchModel = new VisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', ['searchModel' => $searchModel,'dataProvider' => $dataProvider,]);
    }
}
