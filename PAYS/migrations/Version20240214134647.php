<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214134647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C37879EB34');
        $this->addSql('DROP INDEX IDX_43C3D9C37879EB34 ON ville');
        $this->addSql('ALTER TABLE ville DROP id_pays_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ville ADD id_pays_id INT NOT NULL');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C37879EB34 FOREIGN KEY (id_pays_id) REFERENCES pays (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_43C3D9C37879EB34 ON ville (id_pays_id)');
    }
}
