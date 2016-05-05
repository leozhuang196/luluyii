<?php
use yii\helpers\Html;
//生成链接的字符串形式，并传递$token过去
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/default/reset-password','token'=>$user->password_reset_token]);
?>
你好 <?= Html::encode($user->username) ?>，
请于<?php echo date('Y-m-d G:i:s', time()+Yii::$app->params['user.passwordResetTokenExpire']);?>前点击下面的链接重置您的密码：<br/>
<!-- Html::a($text,$url) 前面一个是文本域，后面那个是可以跳转的连接地址
即使你前面的文本域随便写，但是你后面的url写对了就可以跳转到相应的页面-->
<?= Html::a(Html::encode($resetLink), $resetLink) ?>