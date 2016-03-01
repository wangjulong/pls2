<?php

use yii\db\Schema;
use yii\db\Migration;

class m151115_031453_create_role_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('role', [
            'id' => $this->smallInteger(6),
            'role_name' => $this->string(45)->notNull(),
            'role_value' => $this->integer(11)->notNull(),
        ], $tableOptions);
        $this->alterColumn('role', 'id', Schema::TYPE_SMALLINT . '(6)' . ' primary key auto_increment');
    }

    public function down()
    {
        $this->dropTable('role');
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
