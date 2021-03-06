<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200910163625 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auditorium (id INT AUTO_INCREMENT NOT NULL, cinema_id INT DEFAULT NULL, name VARCHAR(128) DEFAULT NULL, status INT DEFAULT NULL COMMENT \'0: Stängd, 1: öppen, 2: tillfälligt stängd\', INDEX IDX_41BE8170B4CB84B6 (cinema_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cinema (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, name VARCHAR(64) DEFAULT NULL, INDEX IDX_D48304B48BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(96) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, movie_cover_id INT DEFAULT NULL, name VARCHAR(192) NOT NULL, year_of_production INT DEFAULT NULL, year_of_release INT NOT NULL, UNIQUE INDEX UNIQ_1D5EF26F4ED1BD64 (movie_cover_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movies_genres (movie_id INT NOT NULL, movie_genre_id INT NOT NULL, INDEX IDX_DF9737A28F93B6FC (movie_id), INDEX IDX_DF9737A29E604892 (movie_genre_id), PRIMARY KEY(movie_id, movie_genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_cover (id INT AUTO_INCREMENT NOT NULL, image_filename VARCHAR(256) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, movie INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_screening (id INT AUTO_INCREMENT NOT NULL, movie_id INT DEFAULT NULL, auditorium_id INT DEFAULT NULL, date DATE NOT NULL, time_start TIME NOT NULL, time_end TIME NOT NULL, INDEX IDX_24DD207B8F93B6FC (movie_id), UNIQUE INDEX UNIQ_24DD207B3CF19AA0 (auditorium_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(128) NOT NULL, email_confirmed VARBINARY(255) DEFAULT NULL, password VARCHAR(160) DEFAULT NULL COMMENT \'SHA-512 hash av lösenord.\', salt VARCHAR(130) DEFAULT NULL, firstname VARCHAR(64) DEFAULT NULL, lastname VARCHAR(64) DEFAULT NULL, api_token VARCHAR(256) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6497BA2F5EB (api_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_movies (user_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_C9F963A0A76ED395 (user_id), INDEX IDX_C9F963A08F93B6FC (movie_id), PRIMARY KEY(user_id, movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auditorium ADD CONSTRAINT FK_41BE8170B4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE cinema ADD CONSTRAINT FK_D48304B48BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F4ED1BD64 FOREIGN KEY (movie_cover_id) REFERENCES movie_cover (id)');
        $this->addSql('ALTER TABLE movies_genres ADD CONSTRAINT FK_DF9737A28F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE movies_genres ADD CONSTRAINT FK_DF9737A29E604892 FOREIGN KEY (movie_genre_id) REFERENCES movie_genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_screening ADD CONSTRAINT FK_24DD207B8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE movie_screening ADD CONSTRAINT FK_24DD207B3CF19AA0 FOREIGN KEY (auditorium_id) REFERENCES auditorium (id)');
        $this->addSql('ALTER TABLE users_movies ADD CONSTRAINT FK_C9F963A0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE users_movies ADD CONSTRAINT FK_C9F963A08F93B6FC FOREIGN KEY (movie_id) REFERENCES movie_screening (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_screening DROP FOREIGN KEY FK_24DD207B3CF19AA0');
        $this->addSql('ALTER TABLE auditorium DROP FOREIGN KEY FK_41BE8170B4CB84B6');
        $this->addSql('ALTER TABLE cinema DROP FOREIGN KEY FK_D48304B48BAC62AF');
        $this->addSql('ALTER TABLE movies_genres DROP FOREIGN KEY FK_DF9737A28F93B6FC');
        $this->addSql('ALTER TABLE movie_screening DROP FOREIGN KEY FK_24DD207B8F93B6FC');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F4ED1BD64');
        $this->addSql('ALTER TABLE movies_genres DROP FOREIGN KEY FK_DF9737A29E604892');
        $this->addSql('ALTER TABLE users_movies DROP FOREIGN KEY FK_C9F963A08F93B6FC');
        $this->addSql('ALTER TABLE users_movies DROP FOREIGN KEY FK_C9F963A0A76ED395');
        $this->addSql('DROP TABLE auditorium');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movies_genres');
        $this->addSql('DROP TABLE movie_cover');
        $this->addSql('DROP TABLE movie_genre');
        $this->addSql('DROP TABLE movie_screening');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE users_movies');
    }
}
