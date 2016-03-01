<?php

use yii\db\Schema;
use yii\db\Migration;

class m151115_042626_create_gender_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('gender', [
            'id' => $this->smallInteger(6),
            'gender_name' => $this->string(45)->notNull(),
        ], $tableOptions);
        $this->alterColumn('gender', 'id', Schema::TYPE_SMALLINT . ' UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT');
    }

    public function down()
    {
        $this->dropTable('gender');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
