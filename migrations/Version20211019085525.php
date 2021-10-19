<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211019085525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331E8D88425');
        $this->addSql('DROP INDEX IDX_CBE5A331E8D88425 ON book');
        $this->addSql('ALTER TABLE book ADD borrower_id INT NOT NULL, DROP borrower_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD borrower_id_id INT DEFAULT NULL, DROP borrower_id');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331E8D88425 FOREIGN KEY (borrower_id_id) REFERENCES borrower (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331E8D88425 ON book (borrower_id_id)');
    }
}
