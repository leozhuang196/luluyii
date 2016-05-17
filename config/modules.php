<?php
return 
[ 
	'user' => [
        'class' => 'modules\user\Module',
    ],
    'test' => [
        'class' => 'modules\test\Module',
    ],
    'post' => [
        'class' => 'modules\post\Module',
    ],
    'rbac' => [
        'class' => 'modules\rbac\Module',
    ],
    //yii2集成富文本编辑器redactor
    'redactor' => [
        'class' => 'yii\redactor\RedactorModule',
        'imageAllowExtensions'=>['jpg','png','gif'],
    ],
];
?>