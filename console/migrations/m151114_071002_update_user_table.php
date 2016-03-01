<?php

use yii\db\Schema;
use yii\db\Migration;

class m151114_071002_update_user_table extends Migration
{
    public function up()
    {
        // 更新 user 表的字段 status 改名为 status_id default 1
        // 新增表字段 user_type_id , role_id default 1
        // 更新created_at , updated_at 类型为 datetime
        $this->addColumn('user', 'user_type_id', Schema::TYPE_SMALLINT . ' not null default 1');
        $this->addColumn('user', 'role_id', Schema::TYPE_SMALLINT . ' not null default 1');
        $this->dropColumn('user', 'status');
        $this->addColumn('user', 'status_id', Schema::TYPE_SMALLINT . ' not null default 1');
        $this->alterColumn('user', 'created_at', Schema::TYPE_DATETIME . ' not null');
        $this->alterColumn('user', 'updated_at', Schema::TYPE_DATETIME . ' not null');
        $this->alterColumn('user', 'id' ,' INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ');
    }

    public function down()
    {
        $this->dropColumn('user', 'user_type_id');
        $this->dropColumn('user', 'role_id');
        $this->dropColumn('user', 'status_id');
        $this->addColumn('user', 'status', Schema::TYPE_SMALLINT . ' not null default 10');
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
