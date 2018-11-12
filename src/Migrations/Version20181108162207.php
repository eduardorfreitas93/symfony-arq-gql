<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181108162207 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE app_users (id SERIAL NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(254) NOT NULL, is_active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824F85E0677 ON app_users (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824E7927C74 ON app_users (email)');
        $this->addSql('CREATE TABLE user_has_role (user_id INT NOT NULL, role_id INT NOT NULL, PRIMARY KEY(user_id, role_id))');
        $this->addSql('CREATE INDEX IDX_EAB8B535A76ED395 ON user_has_role (user_id)');
        $this->addSql('CREATE INDEX IDX_EAB8B535D60322AC ON user_has_role (role_id)');
        $this->addSql('CREATE TABLE role (id SERIAL NOT NULL, role VARCHAR(45) NOT NULL, name VARCHAR(45) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE user_has_role ADD CONSTRAINT FK_EAB8B535A76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_has_role ADD CONSTRAINT FK_EAB8B535D60322AC FOREIGN KEY (role_id) REFERENCES role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_has_role DROP CONSTRAINT FK_EAB8B535A76ED395');
        $this->addSql('ALTER TABLE user_has_role DROP CONSTRAINT FK_EAB8B535D60322AC');
        $this->addSql('DROP TABLE app_users');
        $this->addSql('DROP TABLE user_has_role');
        $this->addSql('DROP TABLE role');
    }
}
