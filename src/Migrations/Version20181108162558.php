<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181108162558 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO role (id, role, name, created_at) VALUES (1, 'ROLE_ADMIN', 'administrador', '2018-05-28 19:51:02')");
        $this->addSql("INSERT INTO role (id, role, name, created_at) VALUES (2, 'ROLE_USER', 'usuário', '2018-05-28 19:51:02')");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
