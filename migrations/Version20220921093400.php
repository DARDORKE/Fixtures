<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220921093400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE subscription_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, identifier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, subscription_type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, address LONGTEXT NOT NULL, INDEX IDX_8D93D649B6596C08 (subscription_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B6596C08 FOREIGN KEY (subscription_type_id) REFERENCES subscription_type (id)');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF78709777D11E');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE ingredient');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, description LONGTEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, category_id_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_6BAF78709777D11E (category_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF78709777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B6596C08');
        $this->addSql('DROP TABLE subscription_type');
        $this->addSql('DROP TABLE user');
    }
}
