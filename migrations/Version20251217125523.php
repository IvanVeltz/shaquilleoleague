<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251217125523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team_night_stats (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, deck_id INT NOT NULL, date DATE NOT NULL, score INT NOT NULL, INDEX IDX_E07145EB296CD8AE (team_id), INDEX IDX_E07145EB111948DC (deck_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_night_stats ADD CONSTRAINT FK_E07145EB296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team_night_stats ADD CONSTRAINT FK_E07145EB111948DC FOREIGN KEY (deck_id) REFERENCES deck (id)');
        $this->addSql('ALTER TABLE matchup DROP score_home, DROP score_away');
        $this->addSql('ALTER TABLE team CHANGE ocup ocup TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team_night_stats DROP FOREIGN KEY FK_E07145EB296CD8AE');
        $this->addSql('ALTER TABLE team_night_stats DROP FOREIGN KEY FK_E07145EB111948DC');
        $this->addSql('DROP TABLE team_night_stats');
        $this->addSql('ALTER TABLE team CHANGE ocup ocup INT NOT NULL');
        $this->addSql('ALTER TABLE matchup ADD score_home INT NOT NULL, ADD score_away INT NOT NULL');
    }
}
