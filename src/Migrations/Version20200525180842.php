<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200525180842 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE ntask ADD ngoal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ntask ADD CONSTRAINT FK_931A3A085B52A860 FOREIGN KEY (ngoal_id) REFERENCES ngoals (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_931A3A085B52A860 ON ntask (ngoal_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ntask DROP CONSTRAINT FK_931A3A085B52A860');
        $this->addSql('DROP INDEX IDX_931A3A085B52A860');
        $this->addSql('ALTER TABLE ntask DROP ngoal_id');
    }
}
