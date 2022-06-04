<?php

declare(strict_types=1);

namespace MyProject\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220604141450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('Alter table user_daten 
            drop column message_ids,
            drop column usr_charIX1,
            modify column IDX varchar(32),
            modify column usr_salt varchar(32),
            modify column usr_role int(2) default 0');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('Alter table user_daten 
            add column message_ids json DEFAULT NULL,
            add column usr_charIX1 int(1),
            modify column IDX int(9),
            modify column usr_salt int(9)
            modify column usr_role int(9) drop default');
    }
}
