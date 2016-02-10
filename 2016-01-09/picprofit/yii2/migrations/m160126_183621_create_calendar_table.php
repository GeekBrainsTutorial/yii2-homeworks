<?php

use yii\db\Schema;
use yii\db\Migration;

class m160126_183621_create_calendar_table extends Migration
{
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS `clndr_calendar` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` TEXT NOT NULL,
  `creator` INT NOT NULL,
  `date_event` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_evrnt_note_1_idx` (`creator` ASC),
  CONSTRAINT `fk_evrnt_note_1`
    FOREIGN KEY (`creator`)
    REFERENCES `clndr_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
        ");
    }

    public function safeDown()
    {
        $this->execute("
           DROP TABLE IF EXISTS `clndr_calendar` ;
        ");
    }
}
