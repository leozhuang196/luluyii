<?php

namespace app\modules\admin\modules\rbac\controllers;

use Yii;
use yii\filters\AccessControl;
use app\modules\admin\modules\rbac\models\PermissionForm;
use app\modules\admin\modules\rbac\controllers\ItemController;
use yii\rbac\Permission;

class PermissionController extends ItemController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        $permissions = $this->authManager->getPermissions();

        return $this->render('index', [
            'permissions' => $permissions,
        ]);
    }

    public function actionCreate()
    {
        $model = new PermissionForm();

        if ($model->load(Yii::$app->request->post())) {
            $permission = new Permission();
            $permission->name = $model->name;
            $this->authManager->add($permission);

            return $this->redirect(['index', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = PermissionForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
