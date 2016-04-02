<?php
class Human {
    private $money = '30两';
    protected $age = 23;
    public $name = 'lily';
    public function __get($p) {
        return  '你想访问我的'.$p.'属性'.''.'<br/>';
    }
}
$lily = new Human();
echo $lily->name; //lily
echo $lily->age; // 你想访问我的age属性
echo $lily->money; // 你想访问我的money属性
echo $lily->friend; // 你想访问我的friend属性

/* 可以总结出:
当我们调用一个权限上不允许调用的属性,和不存在的属性时,
__get魔术方法会自动调用,
并且自动传参,参数值是属性名.
流程:
$lily->age--无权-->__get(age);
$lily->friend--没有此属性-->__get('friend'); */
?>