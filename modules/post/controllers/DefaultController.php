<?php
namespace modules\post\controllers;
use Yii;
use yii\web\Controller;
use modules\post\models\Post;
use yii\web\NotFoundHttpException;
use modules\user\models\User;
use yii\data\Pagination;
use modules\post\models\PostCollection;

class DefaultController extends Controller
{
    public function init()
    {
        parent::init();
        $this->layout = '@themes/basic/layouts/main.php';
    }
    
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
    
    public function actionShowPosts($type,$pageSize = 6)
    {
        $count = Post::find($type)->where(['type'=>$type])->count();//总页数
        $pages = new Pagination(['totalCount' =>$count, 'pageSize' => $pageSize]);//Pagination对象
        $model = $this->findType($type)->offset($pages->offset)->limit($pages->limit)->all();//根据点击页码进行查询
        return $this->render('showPosts',['model'=>$model,'type'=>$type,'pages'=>$pages]);
    }
    
    public function actionCreatePost($type)
    {
        $model = new Post();
        $model->user_id = User::getUser()->id;
        $model->author = User::getUser()->username;
        $model->type = $type;
        $model->created_time = time()+Yii::$app->params['luluyiiGlobal']['utc']['china'];
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
    
    public function actionCollect($id)
    {
        $model = $this->findModel($id);
        $model->collection ++;
        $collection = new PostCollection();
        $collection->user_id = Yii::$app->user->id;
        $collection->post_id = $id;
        $collection->created_time = time()+Yii::$app->params['luluyiiGlobal']['utc']['china'];
        if ($collection->save() && $model->save()){
            Yii::$app->getSession()->setFlash('success','收藏成功');
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
    
    public function actionNoCollect($id)
    {
        $model = $this->findModel($id);
        $model->collection --;
        $collect = PostCollection::findOne(['post_id'=>$id]);
        $collect->nocollect($collect);
        if ($model->save()){
            Yii::$app->getSession()->setFlash('success','取消收藏成功');
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
    
    public function actionMyCollect()
    {
        $collect = PostCollection::find()->where(['user_id'=>Yii::$app->user->id])->orderBy(['created_time'=>SORT_DESC])->all();
        return $this->render('myCollect',['collect'=>$collect]);
    }
    
    public function actionMyPost()
    {
        $post = Post::find()->where(['user_id'=>Yii::$app->user->id])->orderBy(['created_time'=>SORT_DESC])->all();
        return $this->render('myPost',['post'=>$post]);
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
        if (($model = Post::find($type)->where(['type'=>$type])->orderBy(['created_time'=>SORT_DESC])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}