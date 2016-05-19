/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : luluyii

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-05-19 14:15:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lulu_post
-- ----------------------------
DROP TABLE IF EXISTS `lulu_post`;
CREATE TABLE `lulu_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(12) NOT NULL,
  `love_num` int(11) DEFAULT '0',
  `hate_num` int(11) DEFAULT '0',
  `comment_num` int(11) DEFAULT '0',
  `view_num` int(11) DEFAULT '0',
  `collection` int(11) DEFAULT '0',
  `content` varchar(10000) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT '',
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_post
-- ----------------------------
INSERT INTO `lulu_post` VALUES ('1', '31', 'Yii2处理流程', 'admin', '0', '0', '0', '0', '0', '<p><img src=\"/uploads/31/2051bd70fc-1.png\"></p><p>详情请查看 <strong></strong><a href=\"http://www.yiifans.com/forum.php?mod=viewthread&amp;tid=11498\" target=\"_blank\"><strong>老汉的yii2视频教程</strong></a></p><p>第三集：Model、View、Controller基本概念，Yii2请求处理流程</p>', '2', '1462843991');
INSERT INTO `lulu_post` VALUES ('2', '32', 'yii2.0 Activeform表单部分组件使用方法', 'lulubin', '0', '0', '0', '0', '0', '<p style=\"text-align: center;\"><img src=\"/uploads/32/a6309e0c75-2016-05-18092325.png\"></p><p><img src=\"http://www.luluyii.com/uploads/30/6027b8cfb5-2.png\">\r\n</p><p><img src=\"/uploads/32/a9db159138-2016-05-18092421.png\"></p>', '2', '1462772479');
INSERT INTO `lulu_post` VALUES ('8', '32', 'User用户组件yii\\web\\User和User认证类app\\models\\User', 'lulubin', '0', '0', '0', '0', '0', '<p>1。User用户组件：用户状态，User认证类：用户逻辑</p><p>2。配置User用户组件：组件在Application中已经配置了，所以Yii::$app-&gt;user指的是$config组件下的user组件。</p><p>3。配置User认证类：$config=[‘user’=&gt;[‘identityClass’=&gt;’app\\models\\User’]]</p><p>4。User用户组件和User认证类相关联：User认证类通过实现IdentityInterface接口，User用户组件下的identity属性即是User认证类：Yii::$app-&gt;user-&gt;identity</p><p>// 当前用户的身份实例。未认证用户则为 Null 。 $identity = Yii::$app-&gt;user-&gt;identity; </p><p>// 当前用户的ID。 未认证用户则为 Null 。 $id = Yii::$app-&gt;user-&gt;id; </p><p>// 判断当前用户是否是游客（未认证的） $isGuest = Yii::$app-&gt;user-&gt;isGuest;</p>', '2', '1463534282');
INSERT INTO `lulu_post` VALUES ('3', '33', 'View中使用Controller定义的变量', 'blulubin', null, null, null, null, null, '<h2>1.从controller传递值到view中</h2><p><img src=\"http://www.luluyii.com/uploads/30/8511df98c0-3.png\"></p><p><img src=\"http://www.luluyii.com/uploads/30/7bd89d300d-8.png\"></p><h2>2.在Controller设置View::params属性的值，在View中访问</h2><p><img src=\"http://www.luluyii.com/uploads/30/0d87a1c0ff-4.png\"></p><h2><p><img src=\"http://www.luluyii.com/uploads/30/b80d1ec3dd-9.png\"></p>3.View::context获取上下文</h2><h2><img src=\"http://www.luluyii.com/uploads/30/c4d2c9b768-10.png\"></h2><p><img src=\"http://www.luluyii.com/uploads/30/db59260cce-11.png\"></p>', '2', '1462773632');
INSERT INTO `lulu_post` VALUES ('4', '35', 'render($view);查找view文件的5种方式', 'clulubin', '0', '0', '0', '0', '0', '<h2 style=\"text-align: center;\">render($view);查找view文件的5种方式<br></h2><p>在yii\\base\\View中findViewFile()定义匹配规则</p><p>①　别名开头，路径指定view文件：@app/views/site/about(.php)</p><p>②　//开头，使用app目录下的view：//site/about</p><p>③　/开头，使用当前Module中的views：/site/about</p><p>④　直接使用字符串（重要）</p><p>a、在Controller中调用render：如$this-&gt;render(\'about\')</p><p>Controller::render会调用View::render方法</p><p>b、在View中调用render，所使用的view是当前view所在的目录</p><p>如：<br>在about.php中 </p><!--?php echo &#36;this--->render(\'error\',[\'name\'=&gt;\'name\',\'message\'=&gt;\'message\'])?&gt;<p>error文件是about.php所在目录site下面的error.php</p><hr><h2 style=\"text-align: center;\">render、renderPartial、renderContent、renderAjax、renderFile<br></h2><p>① render显示view和layout</p><p>② renderPartial只显示view</p><p>③ renderContent只渲染layout</p><p>④ renderFile显示指定的文件，是最基础的方法，</p><p>renderAjax,renderPartial最终都是调用renderFile.</p><p>⑤ renderAjax只显示view，以ajax方式渲染页面，可以配合js/css实现各种特效</p>', '2', '1462773632');
INSERT INTO `lulu_post` VALUES ('6', '31', 'rbac', 'admin', '0', '0', '0', '0', '0', 'rbac究竟怎么回事啊！！', '3', '1463391302');
INSERT INTO `lulu_post` VALUES ('7', '31', '我是admin', 'admin', '0', '0', '0', '0', '0', '我最大！！！', '1', '1463391345');
INSERT INTO `lulu_post` VALUES ('9', '32', 'mysql中utf8_general_ci/cs、utf8_unicode_ci、utf8_bin', 'lulubin', '0', '0', '0', '0', '0', '<h2>mysql中utf8_general_ci/cs、utf8_unicode_ci、utf8_bin<br></h2><p>ci是case insenstive大小写不敏感的意思</p><p>utf8_general_cs：区分大小写</p><p>utf8_general_ci：不区分大小写，校对快、准确度差</p><p>utf8_unicode_ci：不区分大小写，校对慢、准确度高</p><p>utf8_bin：区分大小写，可存储二进制内容</p><h2>on update cascade 和on delete cascade 作用区别？</h2><p>这是数据库外键定义的一个可选项，用来设置当主键表中的被参考列的数据发生变化时，外键表中响应字段的变换规则的。update 则是主键表中被参考字段的值更新，delete是指在主键表中删除一条记录：<br>on update 和 on delete 后面可以跟的词语有四个<br>no action ， set null ， set default ，cascade<br>no action 表示 不做任何操作，<br>set null 表示在外键表中将相应字段设置为null<br>set default 表示设置为默认值<br>cascade 表示级联操作，就是说，如果主键表中被参考字段更新，外键表中也更新，主键表中的记录被删除，外键表中改行也相应删除</p>', '2', '1463534807');
INSERT INTO `lulu_post` VALUES ('10', '35', 'js位置和registerJsFile的第二个参数options', 'clulubin', '0', '0', '0', '0', '0', '<p>POS_HEAD——head结束标签之前：$this-&gt;registerJs(\'alert(4)\',View::POS_HEAD);</p><p>POS_BEGIN——body开始标签之后：$this-&gt;registerJs(\'alert(4)\',View::POS_BEGIN);</p><p>POS_END——body结束标签之前：$this-&gt;registerJs(\'alert(4)\',View::POS_END);</p><p>POS_READY POS_LOAD：$this-&gt;registerJs(\'alert(4)\', View::<i>POS_READY</i>);</p><p>//depends保证加载JS文件的先后顺序、asset bundles资源包</p><p>//此时先加载yii\\web\\YiiAsset，再加载assets/e05e437e/yii.js</p><p>$this-&gt;registerJsFile(\'assets/e05e437e/yii.js\',</p><p>[\'depends\'=&gt;\'yii\\web\\YiiAsset\',\'position\'=&gt;\\yii\\web\\View::<i>POS_HEAD</i>]);</p>', '2', '1463535017');
INSERT INTO `lulu_post` VALUES ('11', '35', '$layout存在位置和$layout的查找顺序', 'clulubin', '0', '0', '0', '0', '0', '<h2 style=\"text-align: center;\">$layout存在位置和$layout的查找顺序<br></h2><p>① 存在位置：Controller和Module里面定义了布局变量$layout。</p><p>② 查找顺序：先查看当前Controller里面有没有定义布局变量；</p><p> 如果为Null，查找所在Module定义的布局变量；</p><p>查找父级Module定义的布局变量。</p><hr><b></b><h2 style=\"text-align: center;\">$lauout变量值<o:p></o:p></h2><p>① false，不使用布局文件</p><p>② null，使用Module中定义的布局文件</p><p>③ 字符串，指定布局文件：在yii\\base\\Controller中findLayoutFile( )定义匹配规则</p><p>a、别名开头，指定布局文件路径</p><p>b、/开头，指定app下面的布局文件：$this-&gt;layout=’/main’</p><p>c、使用当前Module里面的布局文件</p><hr><b></b><h2 style=\"text-align: center;\">嵌套的布局文件View::beginContent（重要）<o:p></o:p></h2><p>布局文件mylayout所使用的布局文件是main</p><p><img src=\"/uploads/35/7b99efbc10-1.png\">        <img src=\"/uploads/35/90aef91f0d-2.png\"></p><p><img src=\"/uploads/35/37e82b59af-3.png\"></p><p><img src=\"/uploads/35/d76fd0a480-4.png\"><span></span></p>', '2', '1463535614');
INSERT INTO `lulu_post` VALUES ('12', '35', 'View中使用Controller定义的变量', 'clulubin', '0', '0', '0', '0', '0', '<p>方法一：从Controller传递值到View中</p><p><img src=\"/uploads/35/a793d30744-5.png\">  </p><p><img src=\"/uploads/35/a224968154-6.png\"></p><p>方法二：在Controller设置View::params属性的值，在View中访问<img src=\"/uploads/35/b95466b8b1-7.png\"></p><p><img src=\"/uploads/35/cd153a426b-8.png\"></p><p>方法三：View::context获取上下文</p><p><img src=\"/uploads/35/acdf0905e9-9.png\"><span class=\"redactor-invisible-space\"><img src=\"/uploads/35/4147bb2fdd-10.png\"><span class=\"redactor-invisible-space\"></span></span></p>', '2', '1463536042');
INSERT INTO `lulu_post` VALUES ('13', '35', '静态页面', 'clulubin', '0', '0', '0', '0', '0', '<p>如果需要渲染一个静态页面可以使用ViewAction类。</p><p>它会根据用户的设置调用这个action来显示相应的视图文件。</p><p>首先在控制器里面的actions里面</p><pre>&lt;?php<br>class SiteController extends Controller<br>{<br>    public function actions()<br>     {<br>        return [<br>           \'static\' =&gt; [<br>               \'class\' =&gt; \'\\yii\\web\\ViewAction\',<br>             ],<br>            ];<br>     }<br>}<br>?&gt;<br></pre><p>在@app/views/site/pages/目录中创建index.php</p><p>&lt;h1&gt;Hello, I am a static page!&lt;/h1&gt;</p><p>现在可以通过/index.php?r=site/static来访问</p><p>默认情况下是通过GET参数中的view变量来显示相应的静态文件的。</p><p>如果URL为/index.php?r=site/static?&amp;view=about那么将会显示@app/views/site/pages/about.php静态文件。</p><p>静态文件默认按照如下顺序来显示</p><p>获取GET参数：view</p><p>如果没有指定view参数，将使用默认的index.php静态文件。</p><p>在静态文件的目录中查找相应的文件（viewPrefix）：pages为目录</p><p>使用相应的布局文件。</p><p>更多相关信息可以查看yii\\web\\ViewAction。</p>', '2', '1463536134');
INSERT INTO `lulu_post` VALUES ('14', '35', '高级应用模板中配置文件的读取顺序', 'clulubin', '0', '0', '0', '0', '0', '<p><img src=\"/uploads/35/d806ca13ca-11.png\"></p>', '2', '1463536182');
INSERT INTO `lulu_post` VALUES ('15', '35', '利用yii2advanced创建自己的前后台项目名称', 'clulubin', '0', '0', '0', '0', '0', '<p>① 针对backend和frontend文件夹的修改：</p><p>修改backend为lulu-backend、frontend为lulu-frontend</p><p>② 修改common/config/bootstrap.php中的别名</p><p>Yii::setAlias(\'@frontend\', dirname(dirname(__DIR__)) . \'/lulu-frontend\');</p><p>Yii::setAlias(\'@backend\', dirname(dirname(__DIR__)) . \'/lulu-backend\');</p><p>③ 针对environments文件夹的修改：</p><p>3.1、替换environments/index.php中所有的frontend为lulu-frontend，所有的backend为lulu-backend</p><p>3.2、修改environments/dev/backend为lulu-backend、frontend为lulu-frontend</p><p>3.3、修改environments/dev/common/main-local.php中的数据库配置信息</p><p>3.4、environments/prod的修改与environments/dev的修改一样</p><p>④ 运行根目录下的yii.bat</p><p>⑤ 针对lulu-backend和lulu-frontend的修改：</p><p>如果第2步骤中定义的别名不是@frontend、@backend，那么要修改assets、controllers、models中php文件的命名空间</p>', '2', '1463536211');
INSERT INTO `lulu_post` VALUES ('16', '31', 'Yii2.0页面提示消息', 'admin', '0', '0', '0', '0', '0', '<p>适用情况：比如提交一个表单，提交完成之后在页面展示一条提示消息。</p><p>控制器里面这样写：</p><p>单条消息：</p><pre>\\Yii::$app-&gt;getSession()-&gt;setFlash(\'error\', \'This is the message\');\r\n\\Yii::$app-&gt;getSession()-&gt;setFlash(\'success\', \'This is the message\');<br>\\Yii::$app-&gt;getSession()-&gt;setFlash(\'info\', \'This is the message\');多条消息：</pre><p><code>多条消息：<br></code></p><pre>\\Yii::$app-&gt;getSession()-&gt;setFlash(\'error\', [\'Error 1\', \'Error 2\']);</pre><p>然后是视图里面：</p><pre>先引入Alert：use yii\\bootstrap\\Alert;</pre><p>然后是：</p><pre>if( Yii::$app-&gt;getSession()-&gt;hasFlash(\'success\') ) {\r\n    echo Alert::widget([\r\n        \'options\' =&gt; [\r\n            \'class\' =&gt; \'alert-success\', //这里是提示框的class\r\n        ],\r\n        \'body\' =&gt; Yii::$app-&gt;getSession()-&gt;getFlash(\'success\'), //消息体\r\n    ]);\r\n}\r\nif( Yii::$app-&gt;getSession()-&gt;hasFlash(\'error\') ) {\r\n    echo Alert::widget([\r\n        \'options\' =&gt; [\r\n            \'class\' =&gt; \'alert-error\',\r\n        ],\r\n        \'body\' =&gt; Yii::$app-&gt;getSession()-&gt;getFlash(\'error\'),\r\n    ]);\r\n}<br></pre><pre>如果有消息就会显示对应消息，表现是一个div，和bootstrap的警告框是一样的。你想把消息提示放在哪里，把上述代码就放到那里就可以了。<br></pre>', '2', '1463536443');
INSERT INTO `lulu_post` VALUES ('17', '31', '用户登录和自动登录的问题', 'admin', '0', '0', '0', '0', '0', '<p>1。先解释自动登录的问题，用到auth_key，自动登录是根据cookie，获取cookie中用户id，然后去数据库获取用户信息，然后在查询出来的用户信息中auth_key和cookie中的auth_key进行匹配，在改密码后，会改auth_key字段的内容，匹配失败，要重新登录。</p><p>同理，access_token也是自动登录用的，一般是登录链接上带一长串字符，访问就可以登陆了。<br>没有这两个字段，access_token自动登录方式不能使用，cookie登录验证也会失败。<br>如果一定不用这2个字段，access_token自动登录方式不要用，cookie登录去掉auth_key验证（当然，这会出现你说的改密码不需要重登的问题。）。</p>', '2', '1463536558');
INSERT INTO `lulu_post` VALUES ('18', '31', 'Yii2.0 场景的简单使用', 'admin', '0', '0', '0', '0', '0', '<p>下面给大家介绍一下 yii2.0 场景的使用。小伙多唠叨一下了，就是担心有的人还不知道，举个简单的例子，现在在 post表里面有 title image content 三个的字段，当我创建一个 post 的时候，我想三个字段全部是必填项，但是你修改的时候，title content 两个字段是必填的， iamge 可以不填写。正常的情况下，<br>[[\'title\', \'content\', \'image\'], \'required\',], 但是我们更改的时候 只需要 [[\'title\', \'content\'], \'required\'], 就可以了，但是少了 image 字段 我们的表单就无法提交，这种问题怎么办啊？？ 场景可以帮你解决这种问题，下面是一个简单的场景实例。</p><p>1、首先我们在 model 里面定义一下场景 类名必须是 <strong>scenarios()</strong><span class=\"redactor-invisible-space\"><br></span></p><pre>public function scenarios()\r\n{\r\n    return [\r\n        \'create\' =&gt; [\'title\', \'image\', \'content\'],\r\n        \'update\' =&gt; [\'title\', \'content\'],\r\n    ];\r\n}<br></pre><p>2、好的，如上所示，场景的基本设置我们就已经完成一部分了，下面我们设置 <strong>rules()</strong> ,调用场景我们用 <strong>on</strong> 关键字</p><pre>[[\'title\', \'content\'], \'required\', \'on\' =&gt; [\'create\', \'update\']],\r\n[[\'image\'], \'required\', \'on\' =&gt; \'create\'],\r\n[[\'image\'], \'image\', \'enableClientValidation\' =&gt; true,   \'maxSize\' =&gt; 1024, \'message\' =&gt; \'您上传的文件过\r\n大\', \'on\' =&gt; [\'create\']],<br></pre><p><strong>on 指定的就是场景，一个场景用字符串，多个场景用数组</strong></p><p>3、好的，model 里面我们就设置完毕了 现在开始调用吧。 Controller 里面</p><pre>$model = $this-&gt;findModel($id);\r\n$model-&gt;setScenario(\'update\'); or $model-&gt;scenario = \'update\';<br></pre><p>上面的意思就是 调用 update 场景。一切就是这么简单。</p>', '2', '1463536649');
INSERT INTO `lulu_post` VALUES ('19', '31', '解决使用TimestampBehavior自动填充created_at但数据库中显示是0的问题', 'admin', '0', '0', '0', '0', '0', '<p>参照教程自己建了张表，有<code style=\"line-height: 1.6em;\">created_at</code>和<code style=\"line-height: 1.6em;\">updated_at</code>两个字段，使用了<code style=\"line-height: 1.6em;\">TimestampBehavior</code>自动填充。实际测试时发现，使用全自动填充，数据库中的结果是<code style=\"line-height: 1.6em;\">0000-00-00 00：00：00</code>，但手动指定填充字段（<code style=\"line-height: 1.6em;\">created_at</code>和<code style=\"line-height: 1.6em;\">updated_at</code>）和填充方法（<code style=\"line-height: 1.6em;\">new Expression(\'NOW()\')</code>）后数据库中结果正常。</p><p>为什么会这样呢？</p><p>跟踪下源码发现原来是这样的...<br>全自动填充时（未指定填充方法），返回的结果是时间戳，是一串数字；<br>而我手动指定的填充方法（），返回的结果是一个时间值。<br>发现问题没？两个方法返回的结果类型是不一样的，一个是<code>数字</code>，一个是<code>时间</code>。</p><p>所以我们就要根据需要调整字段属性：<br><code>created_at</code>和<code>updated_at</code>字段属性是<code>int</code>时。可使用默认自动填充</p><pre>use yii\\behaviors\\TimestampBehavior;\r\npublic function behaviors()\r\n{\r\n     return [\r\n         TimestampBehavior::className(),\r\n     ];\r\n}<br></pre><p>如果字段属性为<code>timestamp</code>时，可以使用如下方法自动填充：</p><pre>use yii\\db\\Expression;\r\npublic function behaviors()\r\n{\r\n     return [\r\n         [\r\n             \'class\' =&gt; TimestampBehavior::className(),\r\n             \'createdAtAttribute\' =&gt; \'created_at\',\r\n             \'updatedAtAttribute\' =&gt; \'updated_at\',\r\n             \'value\' =&gt; new Expression(\'NOW()\'),\r\n         ],\r\n     ];\r\n}<br></pre>', '2', '1463536695');
INSERT INTO `lulu_post` VALUES ('20', '31', 'yii2-cookbook之定制response类型', 'admin', '0', '0', '0', '0', '0', '<p><strong><em>使用不同的response类型</em></strong><br></p><p>现代的web和移动应用(对Server的要求)已经不仅仅满足于渲染HTML了.现代的软件架构已渐渐将UI看成是一个客户端,客户端负责直接和用户发生交互,整个前端由服务端API驱动.(这种情况下)JSON和XML就常常作为结构化数据的序列化和传输的载体在网络上传输,所以创建这种response的能力已经成为现代服务框架的必备要求.</p><p><strong><em>response类型</em></strong></p><p>你可能知道,yii2的action函数中需要(某种方法)\"返回\"结果,而不是直接echo:</p><pre>// returning HTML result return $this-&gt;render(\'index\', [\r\n    \'items\' =&gt; $items,\r\n]);<br></pre><p>有个好消息是yii2现在可以return其他格式的数据,如:</p><ul><li>数组</li><li>实现了Arrayable接口的对象</li><li>字符串</li><li>实现了__toString()方法的对象</li></ul><p>只是不要忘了在return前设置<code>\\Yii::$app-&gt;response-&gt;format</code>来告诉YII你想要response的类型:</p><pre>\\Yii::$app-&gt;response-&gt;format = \\yii\\web\\Response::FORMAT_JSON;<br></pre><p>可选的类型有:</p><ul><li>FORMAT_RAW</li><li>FORMAT_HTML</li><li>FORMAT_JSON</li><li>FORMAT_JSONP</li><li>FORMAT_XML</li></ul><p>默认是FORMAT_HTML</p><p><strong><em>JSON response</em></strong></p><p>现在我们返回一个数组:</p><pre>public function actionIndex()\r\n{\r\n    \\Yii::$app-&gt;response-&gt;format = \\yii\\web\\Response::FORMAT_JSON;\r\n    $items = [\'some\', \'array\', \'of\', \'data\' =&gt; [\'associative\', \'array\']];\r\n    return $items;\r\n}<br></pre><p>返回结果:</p><pre>{\r\n    \"0\": \"some\",\r\n    \"1\": \"array\",\r\n    \"2\": \"of\",\r\n    \"data\": [\"associative\", \"array\"]\r\n}<br></pre><p><em>注: 如果没有设置response类型你会收到一个exception</em></p><p>同样地,我们还可以返回一个对象:</p><pre>public function actionView($id)\r\n{\r\n    \\Yii::$app-&gt;response-&gt;format = \\yii\\web\\Response::FORMAT_JSON;\r\n    $user = \\app\\models\\User::find($id);\r\n    return $user;\r\n}<br></pre><p>这里的$user是一个ActiveRecord对象,而ActiveRecord类已实现了Arrayable接口,所以它可以很轻易地被转成json:</p><pre>{\r\n    \"id\": 1,\r\n    \"name\": \"John Doe\",\r\n    \"email\": \"john@example.com\"\r\n}<br></pre><p>我们甚至可以返回一个对象数组:</p><pre>public function actionIndex()\r\n{\r\n    \\Yii::$app-&gt;response-&gt;format = \\yii\\web\\Response::FORMAT_JSON;\r\n    $users = \\app\\models\\User::find()-&gt;all();\r\n    return $users;\r\n}<br></pre><p>这里的$users就是一个ActiveRecord对象数组,不过在底层yii是通过<code>\\yii\\helpers\\Json::encode()</code>来传输和转化数据的,所以返回的时候请小心确保数组中元素的类型:</p><pre>[\r\n    {\r\n        \"id\": 1,\r\n        \"name\": \"John Doe\",\r\n        \"email\": \"john@example.com\"\r\n    },\r\n    {\r\n        \"id\": 2,\r\n        \"name\": \"Jane Foo\",\r\n        \"email\": \"jane@example.com\"\r\n    },\r\n    ...\r\n]<br></pre><p><strong><em>XML response</em></strong></p><p>只要把response的format改成FORMAT_XML, 那么你就能得到XML类型的返回值:</p><pre>public function actionIndex()\r\n{\r\n    \\Yii::$app-&gt;response-&gt;format = \\yii\\web\\Response::FORMAT_XML;\r\n    $items = [\'some\', \'array\', \'of\', \'data\' =&gt; [\'associative\', \'array\']];\r\n    return $items;\r\n}\r\n\r\n//返回\r\n&lt;response&gt;\r\n    &lt;item&gt;some&lt;/item&gt;\r\n    &lt;item&gt;array&lt;/item&gt;\r\n    &lt;item&gt;of&lt;/item&gt;\r\n    &lt;data&gt;\r\n        &lt;item&gt;associative&lt;/item&gt;\r\n        &lt;item&gt;array&lt;/item&gt;\r\n    &lt;/data&gt;\r\n&lt;/response&gt;<br></pre><p>是的,我们同样可以把对象转成XML:</p><pre>public function actionIndex()\r\n{\r\n    \\Yii::$app-&gt;response-&gt;format = \\yii\\web\\Response::FORMAT_XML;\r\n    $users = \\app\\models\\User::find()-&gt;all();\r\n    return $users;\r\n}\r\n\r\n//返回\r\n&lt;response&gt;\r\n    &lt;User&gt;\r\n        &lt;id&gt;1&lt;/id&gt;\r\n        &lt;name&gt;John Doe&lt;/name&gt;\r\n        &lt;email&gt;john@example.com&lt;/email&gt;\r\n    &lt;/User&gt;\r\n    &lt;User&gt;\r\n        &lt;id&gt;2&lt;/id&gt;\r\n        &lt;name&gt;Jane Foo&lt;/name&gt;\r\n        &lt;email&gt;jane@example.com&lt;/email&gt;\r\n    &lt;/User&gt;\r\n&lt;/response&gt;<br></pre><p><strong><em>定制化自己的response类型</em></strong></p><p>让我们搞一个自己的response类型玩玩吧.为了让例子有趣点,我们打算respond一个PHP数组格式的数据.</p><p>首先,我们需要先定制一个formatter. 创建文件components/PhpArrayFormatter.php:</p><pre>&lt;?php namespace app\\components;\r\n\r\nuse yii\\helpers\\VarDumper;\r\nuse yii\\web\\ResponseFormatterInterface;\r\n\r\nclass PhpArrayFormatter implements ResponseFormatterInterface\r\n{\r\n    public function format($response)\r\n    {\r\n        $response-&gt;getHeaders()-&gt;set(\'Content-Type\', \'text/php; charset=UTF-8\');\r\n        if ($response-&gt;data !== null) {\r\n            $response-&gt;content = \"&lt;?php\\nreturn \" . VarDumper::export($response-&gt;data) . \";\\n\";\r\n        }\r\n    }\r\n}<br></pre><p>现在我们需要在配置文件中注册这个formatter:</p><pre>return [\r\n    // ...\r\n    \'components\' =&gt; [\r\n        // ...\r\n        \'response\' =&gt; [\r\n            \'formatters\' =&gt; [\r\n                \'php\' =&gt; \'app\\components\\PhpArrayFormatter\',\r\n            ],\r\n        ],\r\n    ],\r\n];<br></pre><p>好了,万事俱备, 现在在controller里创建一个action:</p><pre>public function actionTest()\r\n{\r\n    Yii::$app-&gt;response-&gt;format = \'php\';\r\n    return [\r\n        \'hello\' =&gt; \'world!\',\r\n    ];\r\n}<br></pre><p>执行之后的response是这样的:</p><pre>&lt;?php return [\r\n    \'hello\' =&gt; \'world!\',\r\n];<br></pre>', '2', '1463536967');
INSERT INTO `lulu_post` VALUES ('21', '31', '如何禁用assets', 'admin', '0', '0', '0', '0', '0', '<p>Yii里的那些配置都是可以自定义目录的，文档里都有写</p><p>可以随便指定位置和名字</p><p>如：</p><pre>\'components\' =&gt; [\r\n    \'assetManager\' =&gt; [\r\n        \"basePath\" =&gt; \"@webroot/storage/assets\",\r\n        \"baseUrl\" =&gt; \"@web/storage/assets\",\r\n    ]\r\n]<br></pre>', '2', '1463537026');
INSERT INTO `lulu_post` VALUES ('22', '31', 'yii2 modules怎么发布assets 资源？', 'admin', '0', '0', '0', '0', '0', '<pre>Yii::$app-&gt;getAssetManager()-&gt;publish(...)</pre>', '2', '1463537048');

-- ----------------------------
-- Table structure for lulu_post_type
-- ----------------------------
DROP TABLE IF EXISTS `lulu_post_type`;
CREATE TABLE `lulu_post_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_post_type
-- ----------------------------
INSERT INTO `lulu_post_type` VALUES ('1', '闲聊');
INSERT INTO `lulu_post_type` VALUES ('2', '教程');
INSERT INTO `lulu_post_type` VALUES ('3', '问答');

-- ----------------------------
-- Table structure for lulu_user
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user`;
CREATE TABLE `lulu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lulu_user
-- ----------------------------
INSERT INTO `lulu_user` VALUES ('31', 'admin', 'b1sBb8kuHF_ix3yomwNsvhXBmcgfaI5z', '$2y$13$MBfKaj0Aw0ZopnG2CCDmjOGeDguDzOJMLrfvhkwhkXx08DYpIkPda', null, '452936616@qq.com', '10', '1462765697', '1463538038', '14.216.9.212');
INSERT INTO `lulu_user` VALUES ('32', 'lulubin', 'TPM84TrcoOLOqyQT0hEGtjnBEk2UstmG', '$2y$13$MRc/hQshHRC9nLAjJ88cyu25YNL.9R6s6o3kZllMILg.ashbxS.ve', null, '1363236681@qq.com', '10', '1462801592', '1463538073', '113.105.128.253');
INSERT INTO `lulu_user` VALUES ('33', 'blulubin', 'KV_JVikyASGzQUscWbe_s4_3psQgw2TN', '$2y$13$wz7/LEWGRVSAeJJkn1V3B.Uv0rPPEZ6lwYQBGY0tGJXG8ufP2KP8e', null, '1436539127@qq.com', '10', '1462857085', '1463538140', '14.216.5.202');
INSERT INTO `lulu_user` VALUES ('34', 'alulubin', 'PliZ6OY7452tZ3zJlPpQpdb07L--qREC', '$2y$13$/xoHOPbauM5Tt435jWHmw.jRXDP/QzJU2kJAV99xK66xDsGeRr7Mq', null, 'alulubin@gmail.com', '10', '1462857159', '1463538107', '14.216.5.202');
INSERT INTO `lulu_user` VALUES ('35', 'clulubin', 'A0z1pMMShdDvmc4XniTkDcZPiz3VHB7L', '$2y$13$MpgDEcEZaZk9EwwKetx0G.xDFruCkHLCNLCvf8pu5ngQXWRRvdF/W', null, 'alulubin@126.com', '10', '1462857443', '1463538179', '14.216.5.202');
INSERT INTO `lulu_user` VALUES ('36', 'dlulubin', 'Pqn7XmZxZpCpOIjlGDuBoTveTqTCB1Qo', '$2y$13$WQOml.GF6mgfMWZRUcv9jeR7sKgj6rWlucyTjfrOxs8wSwc48I6XS', null, '13751312852@139.com', '10', '1462857493', '1463538219', '14.216.5.202');
INSERT INTO `lulu_user` VALUES ('37', 'elulubin', 'Uto3r-dHNVuq1zGlGytste-VrrDU4Yxf', '$2y$13$VPM4.jxYo7u35qL9bulvpeVlLO6MDR.LEcPtAbqUNIbgQoyPznwhy', null, '2355724726@qq.com', '10', '1463033594', '1463538249', '14.216.0.137');

-- ----------------------------
-- Table structure for lulu_user_fans
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_fans`;
CREATE TABLE `lulu_user_fans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(12) NOT NULL,
  `to` varchar(12) NOT NULL,
  `focus_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_user_fans
-- ----------------------------
INSERT INTO `lulu_user_fans` VALUES ('61', 'admin', 'dlulubin', '1463539319');
INSERT INTO `lulu_user_fans` VALUES ('16', 'lulubin', 'blulubin', '0');
INSERT INTO `lulu_user_fans` VALUES ('51', 'admin', 'lulubin', '1463066114');
INSERT INTO `lulu_user_fans` VALUES ('37', 'lulubin', 'admin', '1463024626');
INSERT INTO `lulu_user_fans` VALUES ('48', 'clulubin', 'blulubin', '1463057763');
INSERT INTO `lulu_user_fans` VALUES ('40', 'lulubin', 'alulubin', '1463026162');
INSERT INTO `lulu_user_fans` VALUES ('59', 'lulubin', 'dlulubin', '1463120174');
INSERT INTO `lulu_user_fans` VALUES ('39', 'lulubin', 'clulubin', '1463025864');
INSERT INTO `lulu_user_fans` VALUES ('44', 'elulubin', 'dlulubin', '1463047151');
INSERT INTO `lulu_user_fans` VALUES ('47', 'clulubin', 'lulubin', '1463053259');
INSERT INTO `lulu_user_fans` VALUES ('46', 'clulubin', 'elulubin', '1463047817');
INSERT INTO `lulu_user_fans` VALUES ('52', 'admin', 'elulubin', '1463066135');
INSERT INTO `lulu_user_fans` VALUES ('53', 'admin', 'blulubin', '1463066159');
INSERT INTO `lulu_user_fans` VALUES ('54', 'admin', 'alulubin', '1463066187');
INSERT INTO `lulu_user_fans` VALUES ('55', 'lulubin', 'elulubin', '1463066278');
INSERT INTO `lulu_user_fans` VALUES ('58', 'elulubin', 'alulubin', '1463113521');
INSERT INTO `lulu_user_fans` VALUES ('57', 'elulubin', 'lulubin', '1463067300');
INSERT INTO `lulu_user_fans` VALUES ('60', 'clulubin', 'admin', '1463477946');

-- ----------------------------
-- Table structure for lulu_user_info
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_info`;
CREATE TABLE `lulu_user_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'images/default.jpg',
  `sex` tinyint(1) unsigned DEFAULT NULL COMMENT '0=男，1=女，2=保密',
  `qq` int(11) unsigned DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `signin_time` int(11) unsigned NOT NULL,
  `signin_day` int(11) unsigned DEFAULT NULL,
  `signature` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_from` int(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_user_info
-- ----------------------------
INSERT INTO `lulu_user_info` VALUES ('24', '31', 'images/2016/1462972288.jpg', '0', '452936617', '1992年10月02日', '东莞', '10', '1463618481', '3', '我就是鲁鲁槟', '傻逼管理员', '0');
INSERT INTO `lulu_user_info` VALUES ('25', '32', 'images/2016/1463066347.jpg', '0', '1363236681', '1992年10月02日', '汕头', '9', '1463534118', '2', '我才是鲁鲁槟', '我是管理员', '0');
INSERT INTO `lulu_user_info` VALUES ('26', '33', 'images/2016/1463054028.jpg', null, null, null, null, '2', '1463040918', null, '', '', '0');
INSERT INTO `lulu_user_info` VALUES ('27', '34', 'images/2016/1462857641.jpg', null, null, null, null, '1', '1462974021', null, '', '', '0');
INSERT INTO `lulu_user_info` VALUES ('28', '35', 'images/2016/1462857713.jpg', '0', '1363236681', '2016年05月01日', '珠海', '4', '1463534086', '2', '我是C', '', '0');
INSERT INTO `lulu_user_info` VALUES ('29', '36', 'images/2016/1462857752.jpg', null, null, null, null, '1', '1462857758', null, '', '', '0');
INSERT INTO `lulu_user_info` VALUES ('30', '37', 'images/default.jpg', '0', '1436539127', '2000年01月01日', '广州', '3', '1463538287', '1', '我是eeeeeee', '', '0');

-- ----------------------------
-- Table structure for lulu_user_message
-- ----------------------------
DROP TABLE IF EXISTS `lulu_user_message`;
CREATE TABLE `lulu_user_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(12) NOT NULL,
  `to` varchar(12) NOT NULL,
  `content` varchar(255) NOT NULL,
  `send_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lulu_user_message
-- ----------------------------
INSERT INTO `lulu_user_message` VALUES ('13', 'admin', 'lulubin', '我是管理员', '1462961690');
INSERT INTO `lulu_user_message` VALUES ('14', 'admin', 'lulubin', '管理员又来了', '1462980688');
INSERT INTO `lulu_user_message` VALUES ('15', 'lulubin', 'admin', '我要做管理员', '1462980810');
INSERT INTO `lulu_user_message` VALUES ('16', 'clulubin', 'lulubin', '我是你的粉丝', '1462980903');
INSERT INTO `lulu_user_message` VALUES ('17', 'elulubin', 'admin', '管理员你妹', '1463047056');
