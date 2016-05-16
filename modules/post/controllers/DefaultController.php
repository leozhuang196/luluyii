<?php
namespace modules\post\controllers;
use Yii;
use yii\web\Controller;
use modules\post\models\Post;
use yii\web\NotFoundHttpException;
use modules\user\models\User;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['create-post','update-post'],
                'rules' => [
                    ['actions' => ['create-post','update-post'],
                        'allow' => true,'roles'=>['@']
                    ],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index',['tutorial'=>$tutorial,'question'=>$question,'chat'=>$chat]);
    }
    
    public function actionShowPost($id)
    {
        $model = $this->findmodel($id);
        return $this->render('showPost',['model'=>$model]);
    }
    
    public function actionShowQuestion($id)
    {
        $model = $this->findmodel($id);
        return $this->render('showPost',['model'=>$model]);
    }
    
    public function actionCreatePost()
    {
        $model = new Post();
        $model->user_id = User::getUser()->id;
        $model->author = User::getUser()->username;
        $model->created_time = time();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success','成功发布');
            return $this->refresh();
        }
        return $this->render('createPost', ['model' => $model]);
    }
    
    public function actionUpdatePost($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->getSession()->setFlash('success','修改成功');
            return $this->refresh();
        }
        return $this->render('updatePost',['model'=>$model]);
    }
    
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
