<?php

namespace app\modules\admin\modules\rbac\controllers;

use Yii;
use yii\filters\AccessControl;
use app\modules\admin\modules\rbac\controllers\ItemController;
use app\modules\admin\modules\rbac\models\RoleForm;
use yii\rbac\Role;

class RoleController extends ItemController
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
        $roles = $this->authManager->getRoles();

        return $this->render('index', [
            'roles' => $roles,
        ]);
    }

    public function actionCreate()
    {
        $model = new RoleForm();

        if ($model->load(Yii::$app->request->post())) {

            $role = new Role();
            $role->name = $model->name;
            $this->authManager->add($role);

            foreach ($model->child as $permissionName){
                $permissionObj = $this->authManager->getPermission($permissionName);
                $this->authManager->addChild($role, $permissionObj);
            }

            //由于view界面未修改，这里用index界面代替
            return $this->redirect(['index', 'id' => $model->name]);
        } else {
            $permissions = $this->authManager->getPermissions();
            return $this->render('create', [
                'model' => $model,
                'permissions' => $permissions,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = new RoleForm();

        if ($model->load(Yii::$app->request->post())) {

            //更新数据表的角色名字
            $role = new Role();
            $role->name = $model->name;
            $this->authManager->update($role->name, $role);

            //先删除角色对应的全部权限
            $this->authManager->removeChildren($role);
            foreach ($model->child as $permissionName){
                $permissionObj = $this->authManager->getPermission($permissionName);
                //在添加角色的权限
                $this->authManager->addChild($role,$permissionObj);
            }

            return $this->redirect(['index', 'id' => $model->name]);
        } else {

            //获取在index界面点击的角色id
            $role = $this->authManager->getRole($id);
            $model->name = $role->name;

            //通过获取在index界面点击的角色id，从而获取角色对应的权限permission
            $selectedPermission = $this->authManager->getPermissionsByRole($id);
            if($selectedPermission!=null){
                foreach ($selectedPermission as $p){
                    //将获取到的权限赋值给$modle传递给update界面
                    $model->child[] = $p->name;
                }
            }
            //获取item中的全部权限显示在列表
            $permissions = $this->authManager->getPermissions();

            return $this->render('update', [
                'model' => $model,
                'permissions' => $permissions,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->authManager->remove($id);

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = RoleForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
