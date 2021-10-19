<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018140125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD catalogue_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3314A7843DC FOREIGN KEY (catalogue_id) REFERENCES catalogue (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A3314A7843DC ON book (catalogue_id)');
        $this->addSql('DROP INDEX UNIQ_DB904DB4E7927C74 ON borrower');
        $this->addSql('ALTER TABLE borrower ADD username VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DB904DB4F85E0677 ON borrower (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3314A7843DC');
        $this->addSql('DROP INDEX IDX_CBE5A3314A7843DC ON book');
        $this->addSql('ALTER TABLE book DROP catalogue_id');
        $this->addSql('DROP INDEX UNIQ_DB904DB4F85E0677 ON borrower');
        $this->addSql('ALTER TABLE borrower DROP username');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DB904DB4E7927C74 ON borrower (email)');
    }
}
