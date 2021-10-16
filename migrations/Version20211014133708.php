<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014133708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film ADD categorie_id INT NOT NULL, ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_8244BE22BCF5E72D ON film (categorie_id)');
        $this->addSql('CREATE INDEX IDX_8244BE22642B8210 ON film (admin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22BCF5E72D');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22642B8210');
        $this->addSql('DROP INDEX IDX_8244BE22BCF5E72D ON film');
        $this->addSql('DROP INDEX IDX_8244BE22642B8210 ON film');
        $this->addSql('ALTER TABLE film DROP categorie_id, DROP admin_id');
    }
}
