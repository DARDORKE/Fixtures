<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220921080921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient ADD category_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF78709777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_6BAF78709777D11E ON ingredient (category_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF78709777D11E');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP INDEX IDX_6BAF78709777D11E ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP category_id_id');
    }
}
