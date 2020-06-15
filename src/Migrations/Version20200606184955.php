<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200606184955 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE user_mesages ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE user_mesages ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE user_mesages ADD created_by VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_mesages ADD updated_by VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_mesages ADD is_active BOOLEAN NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_mesages DROP created_at');
        $this->addSql('ALTER TABLE user_mesages DROP updated_at');
        $this->addSql('ALTER TABLE user_mesages DROP created_by');
        $this->addSql('ALTER TABLE user_mesages DROP updated_by');
        $this->addSql('ALTER TABLE user_mesages DROP is_active');
    }
}
