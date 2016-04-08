# Yii2开发的后台管理系统 #
用Yii2.0.0开发的后台管理系统.通过RBAC控制不同用户的菜单显示以及权限。


### 安装 ###

1. 直接运行git clone git clone https://lulubin@bitbucket.org/lulubin/luluyii.git克隆到工作目录，或者直接下载zip包
2. 运行composer install --prefer-dist 安装yii2核心文件
3. 在项目根目录下运行init 初始化项目(生成入口脚本、创建runtime目录等)
4. 创建数据库 luluyii 编码 utf8-unicode-ci
5. 运行luluyii.sql导入相关表，具体可以在config/luluyii.sql下面看到
6. 运行yii migrate --migrationPath=@yii/rbac/migrations/导入Yii官方提供的权限控制表