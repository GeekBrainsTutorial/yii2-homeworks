<?php

use yii\db\Schema;
use yii\db\Migration;

class m160201_015339_create_access extends Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m160201_015339_create_access cannot be reverted.\n";

        return false;
    }
    */

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->execute("
                        CREATE TABLE IF NOT EXISTS `tbl_access` (
                          `id` INT NOT NULL AUTO_INCREMENT,
                          `user_owner` INT NOT NULL,
                          `user_gest` INT NOT NULL,
                          `date` DATE NOT NULL,
                          PRIMARY KEY (`id`),
                          INDEX `fk_tbl_access_2_idx` (`user_gest` ASC),
                          INDEX `fk_tbl_access_1_idx` (`user_owner` ASC))
                        ENGINE = InnoDB CHARACTER SET UTF8;
                        ");
    }

    public function safeDown()
    {
        $this->execute("DROP TABLE IF EXISTS `tbl_access`;");
    }

}
