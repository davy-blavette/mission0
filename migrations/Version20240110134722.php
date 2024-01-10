<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110134722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE adresses_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE simple_adresse_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE multiple_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE simple_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE multiple (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE multiple_choix (multiple_id INT NOT NULL, choix_id INT NOT NULL, PRIMARY KEY(multiple_id, choix_id))');
        $this->addSql('CREATE INDEX IDX_D9CDBEADAEDC4C7D ON multiple_choix (multiple_id)');
        $this->addSql('CREATE INDEX IDX_D9CDBEADD9144651 ON multiple_choix (choix_id)');
        $this->addSql('CREATE TABLE simple (id INT NOT NULL, choix_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C17B3D02D9144651 ON simple (choix_id)');
        $this->addSql('ALTER TABLE multiple_choix ADD CONSTRAINT FK_D9CDBEADAEDC4C7D FOREIGN KEY (multiple_id) REFERENCES multiple (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE multiple_choix ADD CONSTRAINT FK_D9CDBEADD9144651 FOREIGN KEY (choix_id) REFERENCES choix (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE simple ADD CONSTRAINT FK_C17B3D02D9144651 FOREIGN KEY (choix_id) REFERENCES choix (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE simple_adresse DROP CONSTRAINT fk_891616ed4de7dc5c');
        $this->addSql('ALTER TABLE simple_adresse_adresses DROP CONSTRAINT fk_8dc5d2c62f3786cc');
        $this->addSql('ALTER TABLE simple_adresse_adresses DROP CONSTRAINT fk_8dc5d2c685e14726');
        $this->addSql('DROP TABLE adresses');
        $this->addSql('DROP TABLE simple_adresse');
        $this->addSql('DROP TABLE simple_adresse_adresses');
        $this->addSql('ALTER TABLE choix ADD name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE multiple_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE simple_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE adresses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE simple_adresse_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adresses (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE simple_adresse (id INT NOT NULL, adresse_id INT NOT NULL, name VARCHAR(255) NOT NULL, multiple VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_891616ed4de7dc5c ON simple_adresse (adresse_id)');
        $this->addSql('CREATE TABLE simple_adresse_adresses (simple_adresse_id INT NOT NULL, adresses_id INT NOT NULL, PRIMARY KEY(simple_adresse_id, adresses_id))');
        $this->addSql('CREATE INDEX idx_8dc5d2c685e14726 ON simple_adresse_adresses (adresses_id)');
        $this->addSql('CREATE INDEX idx_8dc5d2c62f3786cc ON simple_adresse_adresses (simple_adresse_id)');
        $this->addSql('ALTER TABLE simple_adresse ADD CONSTRAINT fk_891616ed4de7dc5c FOREIGN KEY (adresse_id) REFERENCES adresses (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE simple_adresse_adresses ADD CONSTRAINT fk_8dc5d2c62f3786cc FOREIGN KEY (simple_adresse_id) REFERENCES simple_adresse (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE simple_adresse_adresses ADD CONSTRAINT fk_8dc5d2c685e14726 FOREIGN KEY (adresses_id) REFERENCES adresses (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE multiple_choix DROP CONSTRAINT FK_D9CDBEADAEDC4C7D');
        $this->addSql('ALTER TABLE multiple_choix DROP CONSTRAINT FK_D9CDBEADD9144651');
        $this->addSql('ALTER TABLE simple DROP CONSTRAINT FK_C17B3D02D9144651');
        $this->addSql('DROP TABLE multiple');
        $this->addSql('DROP TABLE multiple_choix');
        $this->addSql('DROP TABLE simple');
        $this->addSql('ALTER TABLE choix DROP name');
    }
}
