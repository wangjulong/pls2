<?php

use yii\db\Schema;
use yii\db\Migration;

class m151212_160529_create_kjh_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('kjh', [
            'qh' => $this->primaryKey(),
            'n1'=>$this->smallInteger()->notNull(),
            'n2'=>$this->smallInteger()->notNull(),
            'n3'=>$this->smallInteger()->notNull(),
            'n4'=>$this->smallInteger()->notNull(),
            'n5'=>$this->smallInteger()->notNull(),
            'n6'=>$this->smallInteger()->notNull(),
            'n7'=>$this->smallInteger()->notNull(),
            'n8'=>$this->smallInteger()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('kjh');
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
