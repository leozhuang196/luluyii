<?php
use yii\db\Schema;
use yii\db\Migration;
class m160511_030724_crate_table_user_message extends Migration
{
    public function up()
    {
        $this->createTable('{{%user_message}}', [
            'id' => Schema::TYPE_PK,
            'from' => Schema::TYPE_STRING.'(12) NOT NULL',
            'to' => Schema::TYPE_STRING.'(12) NOT NULL',
            'content' => Schema::TYPE_STRING.'(255) NOT NULL',
            'created_time' => Schema::TYPE_INTEGER.'(11) NOT NULL',
        ]);
    }

    public function down()
    {
       $this->dropTable('{{%user_message}}');
       return true;
    }
}