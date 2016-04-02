<?php

namespace app\modules\admin\modules\rbac\models;

use Yii;
use app\modules\admin\modules\rbac\models\ItemForm;
use yii\rbac\Item;

class PermissionForm extends ItemForm
{
   public function init() {
       parent::init();
       $this->type = Item::TYPE_PERMISSION;
   }
}