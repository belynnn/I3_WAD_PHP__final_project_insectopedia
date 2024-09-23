<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240923092024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE insect (id INT AUTO_INCREMENT NOT NULL, name_insect VARCHAR(255) NOT NULL, species VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, kingdom VARCHAR(255) NOT NULL, phylum VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, order_insect VARCHAR(255) NOT NULL, family VARCHAR(255) NOT NULL, described_by VARCHAR(255) NOT NULL, year_described DATE DEFAULT NULL, activity VARCHAR(255) DEFAULT NULL, cycle VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE observation (id INT AUTO_INCREMENT NOT NULL, nom_insecte VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_insect (user_id INT NOT NULL, insect_id INT NOT NULL, INDEX IDX_F347A6D8A76ED395 (user_id), INDEX IDX_F347A6D8F5DEE3F3 (insect_id), PRIMARY KEY(user_id, insect_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_insect ADD CONSTRAINT FK_F347A6D8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_insect ADD CONSTRAINT FK_F347A6D8F5DEE3F3 FOREIGN KEY (insect_id) REFERENCES insect (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_insect DROP FOREIGN KEY FK_F347A6D8A76ED395');
        $this->addSql('ALTER TABLE user_insect DROP FOREIGN KEY FK_F347A6D8F5DEE3F3');
        $this->addSql('DROP TABLE insect');
        $this->addSql('DROP TABLE observation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_insect');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
