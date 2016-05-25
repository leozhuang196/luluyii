<?php
namespace modules\shop\controllers;
use Yii;
use modules\shop\controllers\DefaultController;
use modules\shop\models\Category;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class CategroyController extends DefaultController
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
    
    
    public function actions() {
        return [
            'nodeChildren' => [
                'class' => 'gilek\gtreetable\actions\NodeChildrenAction',
                'treeModelName' => Category::className()
            ],
            'nodeCreate' => [
                'class' => 'gilek\gtreetable\actions\NodeCreateAction',
                'treeModelName' => Category::className()
            ],
            'nodeUpdate' => [
                'class' => 'gilek\gtreetable\actions\NodeUpdateAction',
                'treeModelName' => Category::className()
            ],
            'nodeDelete' => [
                'class' => 'gilek\gtreetable\actions\NodeDeleteAction',
                'treeModelName' => Category::className()
            ],
            'nodeMove' => [
                'class' => 'gilek\gtreetable\actions\NodeMoveAction',
                'treeModelName' => Category::className()
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('@gilek/gtreetable/views/widget', ['options'=>[
             'manyroots' => true,
             'draggable' => true
        ]]);
    }
}