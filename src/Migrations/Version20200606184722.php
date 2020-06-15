<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200606184722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE user_conversations_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_mesages_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE user_conversations (id INT NOT NULL, partner_id INT DEFAULT NULL, supervisor_id INT DEFAULT NULL, member_id INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2CDCB6A19393F8FE ON user_conversations (partner_id)');
        $this->addSql('CREATE INDEX IDX_2CDCB6A119E9AC5F ON user_conversations (supervisor_id)');
        $this->addSql('CREATE INDEX IDX_2CDCB6A17597D3FE ON user_conversations (member_id)');
        $this->addSql('CREATE TABLE user_mesages (id INT NOT NULL, user_conversation_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D6CF1A001B706F19 ON user_mesages (user_conversation_id)');
        $this->addSql('ALTER TABLE user_conversations ADD CONSTRAINT FK_2CDCB6A19393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_conversations ADD CONSTRAINT FK_2CDCB6A119E9AC5F FOREIGN KEY (supervisor_id) REFERENCES supervisor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_conversations ADD CONSTRAINT FK_2CDCB6A17597D3FE FOREIGN KEY (member_id) REFERENCES member (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_mesages ADD CONSTRAINT FK_D6CF1A001B706F19 FOREIGN KEY (user_conversation_id) REFERENCES user_conversations (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_mesages DROP CONSTRAINT FK_D6CF1A001B706F19');
        $this->addSql('DROP SEQUENCE user_conversations_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_mesages_id_seq CASCADE');
        $this->addSql('DROP TABLE user_conversations');
        $this->addSql('DROP TABLE user_mesages');
    }
}
