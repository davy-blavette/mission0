<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110133140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE adresses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE choix_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE simple_adresse_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adresses (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE choix (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE simple_adresse (id INT NOT NULL, adresse_id INT NOT NULL, name VARCHAR(255) NOT NULL, multiple VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_891616ED4DE7DC5C ON simple_adresse (adresse_id)');
        $this->addSql('CREATE TABLE simple_adresse_adresses (simple_adresse_id INT NOT NULL, adresses_id INT NOT NULL, PRIMARY KEY(simple_adresse_id, adresses_id))');
        $this->addSql('CREATE INDEX IDX_8DC5D2C62F3786CC ON simple_adresse_adresses (simple_adresse_id)');
        $this->addSql('CREATE INDEX IDX_8DC5D2C685E14726 ON simple_adresse_adresses (adresses_id)');
        $this->addSql('ALTER TABLE simple_adresse ADD CONSTRAINT FK_891616ED4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresses (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE simple_adresse_adresses ADD CONSTRAINT FK_8DC5D2C62F3786CC FOREIGN KEY (simple_adresse_id) REFERENCES simple_adresse (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE simple_adresse_adresses ADD CONSTRAINT FK_8DC5D2C685E14726 FOREIGN KEY (adresses_id) REFERENCES adresses (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE adresses_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE choix_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE simple_adresse_id_seq CASCADE');
        $this->addSql('ALTER TABLE simple_adresse DROP CONSTRAINT FK_891616ED4DE7DC5C');
        $this->addSql('ALTER TABLE simple_adresse_adresses DROP CONSTRAINT FK_8DC5D2C62F3786CC');
        $this->addSql('ALTER TABLE simple_adresse_adresses DROP CONSTRAINT FK_8DC5D2C685E14726');
        $this->addSql('DROP TABLE adresses');
        $this->addSql('DROP TABLE choix');
        $this->addSql('DROP TABLE simple_adresse');
        $this->addSql('DROP TABLE simple_adresse_adresses');
    }
}
