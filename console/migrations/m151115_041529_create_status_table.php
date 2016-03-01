<?php

use yii\db\Schema;
use yii\db\Migration;

class m151115_041529_create_status_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('status', [
            'id' => $this->smallInteger(6),
            'status_name' => $this->string(45)->notNull(),
            'status_value' => $this->smallInteger(6)->notNull(),
        ], $tableOptions);
        $this->alterColumn('status', 'id', Schema::TYPE_SMALLINT . '(6)' . ' primary key auto_increment');
    }

    public function down()
    {
        $this->dropTable('status');
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
