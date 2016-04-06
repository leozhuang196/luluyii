<?php

use yii\db\Schema;
use yii\db\Migration;

class m160406_034253_create_table_customer extends Migration
{
    public function up()
    {
        $this->createTable('{{%customer}}', [
            'customer_id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING .'(150) NOT NULL',
        ]);
        $this->insert('{{%customer}}', [
            'name' => 'zhangsan',
        ]);
        $this->insert('{{%customer}}', [
            'name' => 'lisi',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%customer}}');
        return true;
    }
}