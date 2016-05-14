<?php
namespace modules\post\controllers;
use yii\web\Controller;
use modules\post\models\Post;
use modules\post\models\CreatePostForm;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['create'],
                'rules' => [
                    ['actions' => [],'allow' => true,'roles'=>['?']],
                    ['actions' => ['create'],
                        'allow' => true,'roles'=>['@']
                    ],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        $post = Post::find()->all();
        return $this->render('index',['post'=>$post]);
    }
    
    public function actionCreatePost()
    {
        $post = new CreatePostForm();
        return $this->render('CreatePost',['post'=>$post]);
    }
}
