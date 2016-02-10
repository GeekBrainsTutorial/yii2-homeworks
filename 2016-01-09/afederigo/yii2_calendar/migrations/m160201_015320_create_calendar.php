<?php

use yii\db\Schema;
use yii\db\Migration;

class m160201_015320_create_calendar extends Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m160201_015320_create_calendar cannot be reverted.\n";

        return false;
    }
    */

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->execute("
                        CREATE TABLE IF NOT EXISTS `tbl_calendar` (
                          `id` INT NOT NULL AUTO_INCREMENT,
                          `text` TEXT NOT NULL,
                          `creator` INT NOT NULL,
                          `date_event` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          PRIMARY KEY (`id`),
                          INDEX `fk_tbl_note_1_idx` (`creator` ASC))
                        ENGINE = InnoDB CHARACTER SET UTF8;
                        ");
    }

    public function safeDown()
    {
        $this->execute("DROP TABLE IF EXISTS `tbl_calendar`;");
    }

}
