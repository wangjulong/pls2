<?php

use yii\db\Schema;
use yii\db\Migration;

class m151115_043228_create_profile_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('profile', [
            'id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'first_name' => $this->text() . '(60)',
            'last_name' => $this->text() . '(60)',
            'birthdate' => $this->date(),
            'gender_id' => $this->smallInteger(6),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);
        $this->alterColumn('profile','id',Schema::TYPE_INTEGER . ' unsigned unique primary key auto_increment');
        $this->alterColumn('profile','user_id',Schema::TYPE_INTEGER . ' unsigned not null');
        $this->alterColumn('profile','gender_id',Schema::TYPE_SMALLINT . ' unsigned not null');
        $this->addForeignKey('fk_gender_profile', 'profile', 'gender_id', 'gender', 'id');
    }

    public function down()
    {
        $this->dropTable('profile');
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
