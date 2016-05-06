<?php
namespace modules\test\models;

use yii\base\Model;

/***********************************************一、模型的定义********************************************************/
//一般在定义模型的时候都继承自yii\base\Model 或者yii\db\ActiveRecord
class Test extends Model
{
/***********************************************二、属性********************************************************/
//2.1、属性的定义：一般情况下，在模型里面定义的属性是公共的并且是非静态的。
    /* public $username;
    public $password;
    public $email; */
    //另外还可以用其它的方式来声明属性：通过覆盖的attributes()方法。例如,yii\db\ActiveRecord里面定义的属性是使用的相关联的数据表的列名称

//2.4、属性标签
    //在模型里面定义属性标签很简单，只需要重写yii\base\Model::attributeLabels() 方法即可，
    //它返回的是name-value数组，名称为属性的名称，对应的值即为属性的标签名称。
    /* public function attributeLabels(){
        return [
            'username'=>'用户名',
            'password'=>'密码',
        ];
    } */
    //如果想得到一个属性对应的标签可以使用yii\base\Model::attributeLabels($name)方法来得到，其中$name就是属性的名称。返回属性对应的标签。
    //如果某个属性没有定义对应的标签，Yii会使用yii\base\Model::generateAttributeLabel()方法自动生成对应的标签，
    //例如username 会生成 Username, orderNumber 生成 Order Number

/***********************************************三、场景********************************************************/
    //场景说的通俗点，就是不同条件下环境。举个用户注册的例子，普通用户在注册的时候只要用户名、密码、电子邮箱就可以了，
    //而企业用户除了这些外还需要提供企业名称、法人名称、营业执照号什么的，这就是两个不同的场景。
//3.1为了让一个模型能使用在不同的场景下面，Yii里面提供了scenarios()方法，返回的也是name-value数组，
    //name为每个不同 的场景，value是一个数组，为对应场景的所用到的属性。
    /* public function scenarios()
    {
        return [
            'login' => ['username', 'password'],
            'register' => ['username', 'email', 'password'],
        ];
    } */
    //如上所示，用户模型里面有 username,password,email三个属性，在登录的场景下只需要username和password，而在注册的场景中还需要email。
    //如果没有在模型中定义场景scenarios()，那么将会使用默认的场景，即所有的属性都将使用。

//3.2如果在定义场景的同时还要保持默认的场景可用，那么就得需要调用父类的scenarios()
    /* public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['login'] = ['username', 'password'];
        $scenarios['register'] = ['username', 'email', 'password'];
        return $scenarios;
    } */

//3.3有时候我们在批量赋值的时候需要标明某些属性是不安全的，但又想让让这些属性能够正常的验证。
    //我们可以在场景scenarios()中的那些属性前面加上感叹号前缀，如
    //['username', 'password', '!secret']
    //username, password 和secret都能被验证，但在给属性批量赋值的时候只有username和password被认识是安全的可以赋值，而secret就不能被赋值

/***********************************************四、验证********************************************************/
    //在通过模型的属性收集用户输入的数据的时候，通常情况下需要验证这些属性的值，例如不能不空、只能是字母等等。如果验证结果有错误就得需要在界面显示出这些错误信息来让用户修改。

//4.1、验证规则的实现
    //要定义模型的验证规则的只需要重写rules()。每个验证规则可以作用在多个属性上面，还可以指定这个验证规则所作用的场景。
      /*   [
            ['attribute1', 'attribute2', ...], //这个验证规则要验证的属性，
            'validator class or alias',        //验证器，可以用实例，或者类的名称
            'on' => ['scenario1', 'scenario2', ...],//如果指定的使用的场景，则只在这些场景中这个验证规则才有效，否则将作用在所有的场景吧
            'property1' => 'value1',//这个以及下面的name-value用来初始化验证器的属性
            'property2' => 'value2',
            ],
            // ...
        ] */
    //在调用validate()的时候，只有满足下面的条件验证规则才会执行。规则里面必需至少有一个是活动的属性。规则对当前场景来说必需是可用的。

//4.2、自定义验证器和内置验证器
    //如果内置的验证器不满足你的需要，你可以在模型类里面通过方法的定义来实现自己的验证器。这个方法将被包装成 InlineValidator 对象，并在其它验证规则之前先被调用
    //你只需要实现对属性的验证逻辑规则，并在验证失败的时候在模型里面添加相应的错误信息。

    //自定义验证器方法如下
    //public function myValidator($attribute, $params)，其中名称可以随便命名。
    /* public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    } */

    //验证密码的正确性
  /*   public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    } */

//4.3、条件验证
    //可以在满员某些条件的情况下才验证属性，例如一个属性的验证需要另外一个属性值（确认密码等），这个时候可以用when关键字来定义
    /* ['state', 'required', 'when' => function($model) { return $model->country == Country::USA; }],
    ['stateOthers', 'required', 'when' => function($model) { return $model->country != Country::USA; }],
    ['mother', 'required', 'when' => function($model) { return $model->age < 18 && $model->married != true; }], */

    //如果需要在客户端进行逻辑验证（enableClientValidation is true），得需要使用关键字 whenClient
    // ['state', 'required', 'when' => $usa['server-side'], 'whenClient' => $usa['client-side']]

//4.4、验证规则和批量赋值
    //Yii2.0中的的验证规则和批量赋值是分开的，验证规则在模型中的rules()方法中实现，而批量赋值的安全（safe）属性在scenarios()中实现
    //如果想让某些属性在默认场景下面是不安全的，只需要如下设置
    /* public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['username', 'first_name', '!password']
        ];
    } */

/* 
    //验证码
    public $verifyCode;
    public function rules()
    {
        return [
            ['verifyCode', 'captcha'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'verifyCode' => '验证码',
        ];
    } */
    
    //上传文件
    public $file;
    public function rules()
    {
        return [
            [['file'],'file'],
        ];
    }
}
?>