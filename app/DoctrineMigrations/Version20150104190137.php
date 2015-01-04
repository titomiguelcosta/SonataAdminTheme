<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150104190137 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE PageBlock (id INT AUTO_INCREMENT NOT NULL, page_id INT DEFAULT NULL, block_id INT DEFAULT NULL, position INT DEFAULT NULL, slot VARCHAR(255) NOT NULL, enabled TINYINT(1) DEFAULT NULL, INDEX IDX_1ACA5644C4663E4 (page_id), INDEX IDX_1ACA5644E9ED820C (block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, subtitle VARCHAR(255) DEFAULT NULL, lang VARCHAR(5) DEFAULT NULL, slug VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, theme VARCHAR(255) NOT NULL, redirect VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, searchTerms LONGTEXT NOT NULL, seoDescription LONGTEXT DEFAULT NULL, seoKeywords LONGTEXT DEFAULT NULL, cacheTtl INT DEFAULT NULL, enabled TINYINT(1) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, UNIQUE INDEX UNIQ_B438191E989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Block (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, service VARCHAR(255) NOT NULL, category VARCHAR(255) DEFAULT NULL, parameters LONGTEXT DEFAULT NULL, theme VARCHAR(255) DEFAULT NULL, lang VARCHAR(5) DEFAULT NULL, cache_ttl INT DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE PageBlock ADD CONSTRAINT FK_1ACA5644C4663E4 FOREIGN KEY (page_id) REFERENCES Page (id)');
        $this->addSql('ALTER TABLE PageBlock ADD CONSTRAINT FK_1ACA5644E9ED820C FOREIGN KEY (block_id) REFERENCES Block (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE PageBlock DROP FOREIGN KEY FK_1ACA5644C4663E4');
        $this->addSql('ALTER TABLE PageBlock DROP FOREIGN KEY FK_1ACA5644E9ED820C');
        $this->addSql('DROP TABLE PageBlock');
        $this->addSql('DROP TABLE Page');
        $this->addSql('DROP TABLE Block');
    }
}
