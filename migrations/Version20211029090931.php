<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029090931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD salledeprojection_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849551C80A874 FOREIGN KEY (salledeprojection_id) REFERENCES salle_de_projection (id)');
        $this->addSql('CREATE INDEX IDX_42C849551C80A874 ON reservation (salledeprojection_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849551C80A874');
        $this->addSql('DROP INDEX IDX_42C849551C80A874 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP salledeprojection_id');
    }
}
