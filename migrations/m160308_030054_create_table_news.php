<?php

// yii\db\Schema 类定义了一整套可用的抽象类型常量
// 抽象类型和实体类型之间的映射关系是由每个具体的 QueryBuilder 类当中的 yii\db\QueryBuilder::$typeMap 属性所指定的
use yii\db\Schema;
use yii\db\Migration;

class m160308_030054_create_table_news extends Migration
{
   /* 实现事务迁移的一个更为简便的方法是把迁移的代码都放到 safeUp() 和 safeDown() 方法里面。
   它们与 up() 和 down() 的不同点就在于它们是被隐式的封装到事务当中的。
    如此一来，只要这些方法里面的任何一个操作失败了，那么所有之前的操作都会被自动的回滚。 */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . "(255) NOT NULL",
            'content' => Schema::TYPE_TEXT,
            /*  从 2.0.5 的版本开始，schema 构造器提供了更加方便的方法来定义字段，因此上面的 migration 可以被改写成：
            'title' => Schema::string()->notNull(), 不过不生效 */
        ]);

        $this->addColumn('{{%news}}', 'status',' SMALLINT(4) NOT NULL DEFAULT 0
            COMMENT "绑定状态,0:解绑 1:未绑定 2:审核中 3:审核通过 4:审核拒绝 5:禁用"');

        $this->insert('{{%news}}', [
            'name' => 'mhb',
            'content' => 'work hard',
        ]);
    }

    public function safeDown()
    {
        $this->dropColumn('{{%news}}', 'status');
        $this->delete('{{%news}}',['id'=>1]);
        $this->dropTable('{{%news}}');
        //return true 表明这个 migration 是可以通过up恢复的
        return true;
    }


   /*  使用 yii\db\Migration 所提供的方法的好处在于你不需要再显式的创建 yii\db\Command 实例，
    而且在执行每个方法的时候都会显示一些有用的信息来告诉我们数据库操作是不是都已经完成，
    还有它们完成这些操作花了多长时间等等。 */

    /* 提示：yii\db\Migration 并没有提供数据库的查询方法。这是因为通常你是不需要去数据库把数据一行一行查出来再显示出来的。
    另外一个原因是你完全可以使用强大的 Query Builder 查询构建器 来构建和查询。 */

    /* 使用cmd提交迁移：
    yii migrate/to 150101_185401                      # 使用时间戳来指定迁移
    yii migrate/to m150101_185401_create_news_table   # 使用全名 */

    /* 还原迁移
    yii migrate/down     # 还原最近一次提交的迁移
    yii migrate/down 3   # 还原最近三次提交的迁移 */

    /* 重做迁移：先还原指定的迁移，然后再次提交
    yii migrate/redo        #  重做最近一次提交的迁移
    yii migrate/redo 3      #  重做最近三次提交的迁移 */

   /*  列出迁移
    yii migrate/history     # 显示最近10次提交的迁移
    yii migrate/history 5   # 显示最近5次提交的迁移
    yii migrate/history all # 显示所有已经提交过的迁移
    yii migrate/new         # 显示前10个还未提交的迁移
    yii migrate/new 5       # 显示前5个还未提交的迁移
    yii migrate/new all     # 显示所有还未提交的迁移 */

    /* 修改迁移历史：有时候你也许需要简单的标记一下你的数据库已经升级到一个特定的迁移，而不是实际提交或者是还原迁移
    yii migrate/mark 150101_185401                      # 使用时间戳来指定迁移
    yii migrate/mark m150101_185401_create_news_table   # 使用全名 */

    /* 自定义迁移
    yii migrate --migrationPath=@app/modules/forum/migrations --interactive=0 # 在 forum 模块中以非交互模式进行迁移 */

    /* 全局配置命令
    return [
        'controllerMap' => [
            'migrate' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationTable' => 'backend_migration',
            ],
        ],
    ]; */

    /* 迁移多个数据库
    yii migrate --db=db2 #把迁移提交到 db2 数据库当中
    yii migrate --migrationPath=@app/migrations/db1 --db=db1 #把 @app/migrations/db1 目录下的迁移提交到 db1 数据库当中
    yii migrate --migrationPath=@app/migrations/db2 --db=db2 #把 @app/migrations/db2 下的迁移提交到 db2 数据库当中
    如果有多个迁移都使用到了同一个数据库，那么建议你创建一个迁移的基类，里面包含上述的 init() 代码。然后每个迁移类都继承这个基类就可以了*/
}
