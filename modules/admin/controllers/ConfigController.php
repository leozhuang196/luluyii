<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Config;
use app\models\search\ConfigSearch;
use app\models\config\BasicConfig;
use app\models\config\ThemeConfig;
use app\models\config\EmailConfig;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ConfigController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ConfigSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //网站的基本信息配置
    public function actionBasic()
    {
        $model = new BasicConfig();

        if($model->load(Yii::$app->request->post()) && $model->saves()){
        }else{
            $model->inits();
            return $this->render('basic',['model'=>$model]);
        }
    }

    //网站的主题配置
    public function actionTheme()
    {
        $model = new ThemeConfig();
        if($model->load(Yii::$app->request->post()) && $model->saves()){
        }else{
            $model->inits();
            return $this->render('theme',['model'=>$model]);
        }
    }

    //网站的邮箱配置
    public function actionEmail()
    {
        $model = new EmailConfig();
        if($model->load(Yii::$app->request->post()) && $model->saves()){
        }else{
            $model->inits();
            return $this->render('email',['model'=>$model]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Config();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Config model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Config model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Config model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Config the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Config::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
