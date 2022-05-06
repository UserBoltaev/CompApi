<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220506033435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add countries_id to table Cities';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cities ADD countries_id INT NOT NULL');
        $this->addSql('ALTER TABLE cities ADD CONSTRAINT FK_D95DB16BAEBAE514 FOREIGN KEY (countries_id) REFERENCES countries (id)');
        $this->addSql('CREATE INDEX IDX_D95DB16BAEBAE514 ON cities (countries_id)');
        $this->addSql('DROP INDEX name ON companies');
        $this->addSql('ALTER TABLE companies CHANGE labors no VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cities DROP FOREIGN KEY FK_D95DB16BAEBAE514');
        $this->addSql('DROP INDEX IDX_D95DB16BAEBAE514 ON cities');
        $this->addSql('ALTER TABLE cities DROP countries_id');
        $this->addSql('ALTER TABLE companies CHANGE no labors VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX name ON companies (name)');
    }
}
