<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240111093811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE search_adresse_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE choix_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE multiple_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE simple_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE search_address_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE search_address (id INT NOT NULL, address VARCHAR(255) NOT NULL, ip VARCHAR(39) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE simple DROP CONSTRAINT fk_c17b3d02d9144651');
        $this->addSql('ALTER TABLE multiple_choix DROP CONSTRAINT fk_d9cdbeadaedc4c7d');
        $this->addSql('ALTER TABLE multiple_choix DROP CONSTRAINT fk_d9cdbeadd9144651');
        $this->addSql('DROP TABLE multiple');
        $this->addSql('DROP TABLE choix');
        $this->addSql('DROP TABLE search_adresse');
        $this->addSql('DROP TABLE simple');
        $this->addSql('DROP TABLE multiple_choix');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE search_address_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE search_adresse_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE choix_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE multiple_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE simple_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE multiple (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE choix (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE search_adresse (id INT NOT NULL, adresse VARCHAR(255) NOT NULL, ip VARCHAR(39) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE simple (id INT NOT NULL, choix_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c17b3d02d9144651 ON simple (choix_id)');
        $this->addSql('CREATE TABLE multiple_choix (multiple_id INT NOT NULL, choix_id INT NOT NULL, PRIMARY KEY(multiple_id, choix_id))');
        $this->addSql('CREATE INDEX idx_d9cdbeadd9144651 ON multiple_choix (choix_id)');
        $this->addSql('CREATE INDEX idx_d9cdbeadaedc4c7d ON multiple_choix (multiple_id)');
        $this->addSql('ALTER TABLE simple ADD CONSTRAINT fk_c17b3d02d9144651 FOREIGN KEY (choix_id) REFERENCES choix (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE multiple_choix ADD CONSTRAINT fk_d9cdbeadaedc4c7d FOREIGN KEY (multiple_id) REFERENCES multiple (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE multiple_choix ADD CONSTRAINT fk_d9cdbeadd9144651 FOREIGN KEY (choix_id) REFERENCES choix (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE search_address');
    }
}
