<?php
namespace modules\post\controllers;

use yii\web\Controller;
use modules\post\models\Post;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $post = Post::find()->all();
        return $this->render('index',['post'=>$post]);
    }
}
