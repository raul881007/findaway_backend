<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200604182245 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE member_projects ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE member_projects ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE member_projects ADD created_by VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE member_projects ADD updated_by VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE member_projects ADD is_active BOOLEAN NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE member_projects DROP created_at');
        $this->addSql('ALTER TABLE member_projects DROP updated_at');
        $this->addSql('ALTER TABLE member_projects DROP created_by');
        $this->addSql('ALTER TABLE member_projects DROP updated_by');
        $this->addSql('ALTER TABLE member_projects DROP is_active');
    }
}
