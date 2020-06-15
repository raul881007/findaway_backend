<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610171222 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE member_goals ADD partner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE member_goals ADD CONSTRAINT FK_A5058BDC9393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A5058BDC9393F8FE ON member_goals (partner_id)');
        $this->addSql('ALTER TABLE member_projects ADD partner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE member_projects ADD CONSTRAINT FK_AB4E104E9393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_AB4E104E9393F8FE ON member_projects (partner_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE member_goals DROP CONSTRAINT FK_A5058BDC9393F8FE');
        $this->addSql('DROP INDEX IDX_A5058BDC9393F8FE');
        $this->addSql('ALTER TABLE member_goals DROP partner_id');
        $this->addSql('ALTER TABLE member_projects DROP CONSTRAINT FK_AB4E104E9393F8FE');
        $this->addSql('DROP INDEX IDX_AB4E104E9393F8FE');
        $this->addSql('ALTER TABLE member_projects DROP partner_id');
    }
}
