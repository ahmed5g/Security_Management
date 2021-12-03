<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202173933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE traitements (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reclamations ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE reclamations ADD CONSTRAINT FK_1CAD6B7619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_1CAD6B7619EB6921 ON reclamations (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE traitements');
        $this->addSql('ALTER TABLE reclamations DROP FOREIGN KEY FK_1CAD6B7619EB6921');
        $this->addSql('DROP INDEX IDX_1CAD6B7619EB6921 ON reclamations');
        $this->addSql('ALTER TABLE reclamations DROP client_id');
    }
}
