<?php

use yii\db\Schema;
use yii\db\Migration;

class m160126_184409_create_access_table extends Migration
{
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS `clndr_access` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_owner` INT NOT NULL,
  `user_guest` INT NOT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_clndr_access_1_idx` (`user_owner` ASC),
  INDEX `fk_clndr_access_2_idx` (`user_guest` ASC),
  CONSTRAINT `fk_clndr_access_1`
    FOREIGN KEY (`user_owner`)
    REFERENCES `clndr_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clndr_access_2`
    FOREIGN KEY (`user_guest`)
    REFERENCES `clndr_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
        ");
    }

    public function safeDown()
    {
        $this->execute("
           DROP TABLE IF EXISTS `clndr_access` ;
        ");
    }
}
