<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240216082328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE mood_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE mood (id INT NOT NULL, user_id_id INT NOT NULL, mood_date DATE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, comment VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_339AEF69D86650F ON mood (user_id_id)');
        $this->addSql('COMMENT ON COLUMN mood.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE mood ADD CONSTRAINT FK_339AEF69D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" DROP google_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE mood_id_seq CASCADE');
        $this->addSql('ALTER TABLE mood DROP CONSTRAINT FK_339AEF69D86650F');
        $this->addSql('DROP TABLE mood');
        $this->addSql('ALTER TABLE "user" ADD google_id INT DEFAULT NULL');
    }
}
