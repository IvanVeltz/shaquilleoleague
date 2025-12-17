<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251202144519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conference (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deck (id INT AUTO_INCREMENT NOT NULL, compet_id INT NOT NULL, number INT NOT NULL, number_of_pick INT NOT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, INDEX IDX_4FAC363747E0E8E8 (compet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matchup (id INT AUTO_INCREMENT NOT NULL, team_home_id INT NOT NULL, team_away_id INT NOT NULL, deck_id INT NOT NULL, week INT NOT NULL, game INT NOT NULL, score_home INT NOT NULL, score_away INT NOT NULL, INDEX IDX_D5ED5651D7B4B9AB (team_home_id), INDEX IDX_D5ED5651729679A8 (team_away_id), INDEX IDX_D5ED5651111948DC (deck_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, pseudo VARCHAR(255) NOT NULL, ligue INT NOT NULL, INDEX IDX_98197A65296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_night_stat (id INT AUTO_INCREMENT NOT NULL, deck_id INT NOT NULL, player_id INT NOT NULL, date_of_pick DATE NOT NULL, nba_player VARCHAR(255) DEFAULT NULL, score INT NOT NULL, best_pick TINYINT(1) NOT NULL, INDEX IDX_CABA73A7111948DC (deck_id), INDEX IDX_CABA73A799E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE point_ranking (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, deck_id INT NOT NULL, is_win TINYINT(1) NOT NULL, points INT NOT NULL, INDEX IDX_376CC01C296CD8AE (team_id), INDEX IDX_376CC01C111948DC (deck_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, team_conf_id INT NOT NULL, name VARCHAR(255) NOT NULL, twitter LONGTEXT NOT NULL, ocup TINYINT(1) NOT NULL, url_logo LONGTEXT NOT NULL, rank_ttfl INT NOT NULL, short_name VARCHAR(3) NOT NULL, INDEX IDX_C4E0A61F80A6386F (team_conf_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE deck ADD CONSTRAINT FK_4FAC363747E0E8E8 FOREIGN KEY (compet_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE matchup ADD CONSTRAINT FK_D5ED5651D7B4B9AB FOREIGN KEY (team_home_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE matchup ADD CONSTRAINT FK_D5ED5651729679A8 FOREIGN KEY (team_away_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE matchup ADD CONSTRAINT FK_D5ED5651111948DC FOREIGN KEY (deck_id) REFERENCES deck (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE player_night_stat ADD CONSTRAINT FK_CABA73A7111948DC FOREIGN KEY (deck_id) REFERENCES deck (id)');
        $this->addSql('ALTER TABLE player_night_stat ADD CONSTRAINT FK_CABA73A799E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE point_ranking ADD CONSTRAINT FK_376CC01C296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE point_ranking ADD CONSTRAINT FK_376CC01C111948DC FOREIGN KEY (deck_id) REFERENCES deck (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F80A6386F FOREIGN KEY (team_conf_id) REFERENCES conference (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deck DROP FOREIGN KEY FK_4FAC363747E0E8E8');
        $this->addSql('ALTER TABLE matchup DROP FOREIGN KEY FK_D5ED5651D7B4B9AB');
        $this->addSql('ALTER TABLE matchup DROP FOREIGN KEY FK_D5ED5651729679A8');
        $this->addSql('ALTER TABLE matchup DROP FOREIGN KEY FK_D5ED5651111948DC');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65296CD8AE');
        $this->addSql('ALTER TABLE player_night_stat DROP FOREIGN KEY FK_CABA73A7111948DC');
        $this->addSql('ALTER TABLE player_night_stat DROP FOREIGN KEY FK_CABA73A799E6F5DF');
        $this->addSql('ALTER TABLE point_ranking DROP FOREIGN KEY FK_376CC01C296CD8AE');
        $this->addSql('ALTER TABLE point_ranking DROP FOREIGN KEY FK_376CC01C111948DC');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F80A6386F');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE conference');
        $this->addSql('DROP TABLE deck');
        $this->addSql('DROP TABLE matchup');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE player_night_stat');
        $this->addSql('DROP TABLE point_ranking');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
