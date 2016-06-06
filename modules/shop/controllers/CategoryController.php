<?php
namespace modules\shop\controllers;

use app\controllers\BackController;
use modules\shop\models\Category;

class CategoryController extends BackController
{
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