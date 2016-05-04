<?php

namespace modules\user\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    const ROLE_USER = 10;
    const ROLE_ADMIN = 20;
    const ROLE_SUPER_ADMIN = 30;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'Id'),
            'username' => Yii::t('user', 'Username'),
            'email' => Yii::t('user', 'Email'),
            'created_at' => Yii::t('user', 'Created At'),
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        //substr() 函数返回字符串的一部分
        //strrpos() 函数查找字符串在另一字符串中最后一次出现的位置

        //由于传入的$token是Bfe5gCKLvTVxjjPr5QgnZNgXhgRFqsBQ_1456996433这种形式的，截取_后面的unix时间戳

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        //表示保存的时间，user.passwordResetTokenExpire定义在params.php文件中
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];

        //如果$token是之前的unix时间戳+保存的时间 >= 当前Unix时间，则表示重置密码的令牌还未过期
        //如果令牌过期了，则返回flase
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    //当前用户的（cookie）认证密钥
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    //当一个用户为第一次使用，提供了一个密码时（比如：注册时），密码就需要被哈希化
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    //用户注册时生成的随机字符串
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    //重置用户的password_reset_token
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    //判断用户是否为超级用户
    public static function isSuperAdmin($username)
    {
        if(strpos($username, '@')){   
            if(static::findOne(['email'=>$username,'role'=>self::ROLE_SUPER_ADMIN])){
                return true;
            }
        }else{
            if(static::findOne(['username'=>$username,'role'=>self::ROLE_SUPER_ADMIN])){
                return true;
            }
        }
        return false;
    }
}