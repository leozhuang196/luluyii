<?php
use yii\db\Schema;
use yii\db\Migration;
class m160511_074258_create_table_user_fans extends Migration
{
    public function up()
    {
        $this->createTable('{{%user_fans}}', [
            'id' => Schema::TYPE_PK,
            'from' => Schema::TYPE_STRING.'(12) NOT NULL',
            'to' => Schema::TYPE_STRING.'(12) NOT NULL',
        ]);
    }

    public function down()
    {
       $this->dropTable('{{%user_fans}}');
       return true;
    }
}