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
        $this->addSql('Alter table user_daten drop column message_ids');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('Alter table user_daten add message_ids json DEFAULT NULL');
    }
}
