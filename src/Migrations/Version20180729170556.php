<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180729170556 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("INSERT INTO language (id, name, code, created_at, updated_at, created_by, updated_by, is_active) VALUES (1, 'English', 'en', '2020-04-14 20:31:09', '2020-04-14 20:31:12', 'admin', null, true);");
        $this->addSql("INSERT INTO language (id, name, code, created_at, updated_at, created_by, updated_by, is_active) VALUES (2, 'Spanish', 'es', '2020-04-14 20:31:09', '2020-04-14 20:31:12', 'admin', null, true);");
        $this->addSql("select setval('language_id_seq', (select max(id) from language));");

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
