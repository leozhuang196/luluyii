<?php
namespace modules\shop\controllers;
use Yii;
use modules\shop\models\Stm;
use modules\shop\models\StmSearch;
use app\controllers\BackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use modules\shop\models\StmImg;

class StmController extends BackController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new StmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id),]);
    }

    public function actionCreate()
    {
        $model = new Stm();
        if ($model->load(Yii::$app->request->post())) {
            //$transaction = Yii::$app->db->beginTransaction ();
            if ($model->save()){
                $stm_img = new StmImg();
                $stm_img->stm_id = $model->id;
                //$transaction->commit ();
                $stm_img->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', ['model' => $model,]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Stm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
