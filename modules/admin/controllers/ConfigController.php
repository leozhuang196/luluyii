<?php
namespace app\modules\admin\controllers;
use Yii;
use app\modules\admin\models\config\BasicConfig;
use app\modules\admin\models\config\ThemeConfig;
use yii\web\Controller;
use yii\filters\AccessControl;

class ConfigController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionBasic()
    {
        $model = new BasicConfig();
        if($model->load(Yii::$app->request->post()) && $model->saves()){
        }else{
            $model->inits();
            return $this->render('basic',['model'=>$model]);
        }
    }

    public function actionTheme()
    {
        $model = new ThemeConfig();
        if($model->load(Yii::$app->request->post()) && $model->saves()){
        }else{
            $model->inits();
            return $this->render('theme',['model'=>$model]);
        }
    }
}