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
                'only' => ['index','create-post','update-post'],
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
    
    public function actionShowPosts($type)
    {
        $model = $this->findType($type);
        return $this->render('showPosts',['model'=>$model,'type'=>$type]);
    }
    
    public function actionCreatePost($type)
    {
        $model = new Post();
        $model->user_id = User::getUser()->id;
        $model->author = User::getUser()->username;
        $model->type = $type;
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
        //如果当前想要修改的用户不是作者，返回主页面
        if ($model->author != User::getUser()['username']){
            return $this->goHome();
        }
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
    
    protected function findType($type)
    {
        if (($model = Post::find($type)->where(['type'=>$type])->orderBy(['created_time'=>SORT_DESC])->all()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}