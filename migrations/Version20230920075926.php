<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920075926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campaign (id VARCHAR(255) NOT NULL, title VARCHAR(150) DEFAULT NULL, content VARCHAR(255) DEFAULT NULL, create_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', goal INT DEFAULT NULL, name VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) DEFAULT NULL, email VARCHAR(200) DEFAULT NULL, campaign_id VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, amount INT DEFAULT NULL, create_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', participant_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
       
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE campaign');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE payment');
        
    }
}
