<?php

use yii\db\Schema;
use yii\db\Migration;

class m160406_034457_create_table_order extends Migration
{
    public function up()
    {
        $this->createTable('{{%order}}', [
            'order_id' => Schema::TYPE_PK,
            'customer_id' => Schema::TYPE_SMALLINT .'(1) NOT NULL',
            'price' => Schema::TYPE_FLOAT .'(6,2) NOT NULL',
        ]);
        $this->insert('{{%order}}', [
            'customer_id' => 1,
            'price' => 10,
        ]);
        $this->insert('{{%order}}', [
            'customer_id' => 1,
            'price' => 20,
        ]);
        $this->insert('{{%order}}', [
            'customer_id' => 2,
            'price' => 30,
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%order}}');
        return true;
    }

}