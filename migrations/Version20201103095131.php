<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201103095131 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, denomination VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, surface INT NOT NULL, type VARCHAR(255) NOT NULL, chambre INT NOT NULL, etage INT NOT NULL, prix INT NOT NULL, adresse LONGTEXT NOT NULL, cp INT DEFAULT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, accessibility TINYINT(1) NOT NULL, INDEX IDX_5E9E89CBBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE immobilier DROP categorie_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE location');
        $this->addSql('ALTER TABLE immobilier ADD categorie_id INT NOT NULL');
    }
}
