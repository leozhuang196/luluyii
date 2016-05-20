<?php
namespace modules\user\controllers;
use Yii;
use yii\helpers\Json;
use modules\user\models\UserInfo;
use modules\user\models\UserInfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class UserInfoController extends Controller
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

    public function actionIndex()
    {
        $searchModel = new UserInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //controller层进行异步操作,http://www.manks.top/yii2_gridview_advanced.html
        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $model = UserInfo::findOne(['id' => $id]);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $posted = current($_POST['UserInfo']);
            $post = ['UserInfo' => $posted];
            if ($model->load($post)) {
                $model->save();
                $output = '';
                isset($posted['qq']) && $output = $model->qq;
            }
            $out = Json::encode(['output'=>$output, 'message'=>'']);
            echo $out;
            return;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

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
    
    protected function findModel($id)
    {
        if (($model = UserInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
