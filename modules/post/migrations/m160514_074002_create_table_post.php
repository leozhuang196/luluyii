<?php
use yii\db\Schema;
use yii\db\Migration;

class m160514_074002_create_table_post extends Migration
{
public function up()
    {
        $this->createTable('{{%post}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER.'(11) NOT NULL',
            'author' => Schema::TYPE_STRING.'(12) NOT NULL',
            'love_num' => Schema::TYPE_INTEGER.'(11) NOT NULL',
            'hate_num' => Schema::TYPE_INTEGER.'(11) NOT NULL',
            'view_num' => Schema::TYPE_INTEGER.'(11) NOT NULL',
            'comment_num' => Schema::TYPE_INTEGER.'(11) NOT NULL',
            'collection' => Schema::TYPE_INTEGER.'(11) NOT NULL',
            'content' => Schema::TYPE_STRING.'(255) NOT NULL',
            'type' => Schema::TYPE_STRING.'(10) NOT NULL',
            'description' => Schema::TYPE_STRING.'(100) NOT NULL',
            'created_time' => Schema::TYPE_INTEGER.'(11) NOT NULL',
        ]);
    }

    public function down()
    {
       $this->dropTable('{{%user_post}}');
       return true;
    }
}