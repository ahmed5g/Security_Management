<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202174544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamations ADD traitement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamations ADD CONSTRAINT FK_1CAD6B76DDA344B6 FOREIGN KEY (traitement_id) REFERENCES traitements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CAD6B76DDA344B6 ON reclamations (traitement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamations DROP FOREIGN KEY FK_1CAD6B76DDA344B6');
        $this->addSql('DROP INDEX UNIQ_1CAD6B76DDA344B6 ON reclamations');
        $this->addSql('ALTER TABLE reclamations DROP traitement_id');
    }
}
