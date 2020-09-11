<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200910231015 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resource (id INT AUTO_INCREMENT NOT NULL, resource_container_id INT DEFAULT NULL, filename VARCHAR(256) NOT NULL, created DATETIME NOT NULL, INDEX IDX_BC91F41639407CA4 (resource_container_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resource_container (id INT AUTO_INCREMENT NOT NULL, path_prefix VARCHAR(256) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE resource ADD CONSTRAINT FK_BC91F41639407CA4 FOREIGN KEY (resource_container_id) REFERENCES resource_container (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resource DROP FOREIGN KEY FK_BC91F41639407CA4');
        $this->addSql('DROP TABLE resource');
        $this->addSql('DROP TABLE resource_container');
    }
}
