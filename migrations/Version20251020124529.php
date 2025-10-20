<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251020124529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, numero SMALLINT NOT NULL, series LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', date_sortie DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, rating DOUBLE PRECISION DEFAULT NULL, date_sortie DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', pays VARCHAR(100) NOT NULL, genre LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', realisateur VARCHAR(100) NOT NULL, studio VARCHAR(100) NOT NULL, affiche VARCHAR(255) NOT NULL, video_source VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, rating DOUBLE PRECISION DEFAULT NULL, date_sortie DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', pays VARCHAR(100) NOT NULL, genre LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', realisateur VARCHAR(100) NOT NULL, studio VARCHAR(100) NOT NULL, affiche VARCHAR(255) NOT NULL, video_source VARCHAR(450) NOT NULL, episodes LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE serie');
    }
}
