<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018174924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3314A7843DC');
        $this->addSql('DROP TABLE catalogue');
        $this->addSql('DROP INDEX IDX_CBE5A3314A7843DC ON book');
        $this->addSql('ALTER TABLE book CHANGE catalogue_id borrower_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331E8D88425 FOREIGN KEY (borrower_id_id) REFERENCES borrower (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331E8D88425 ON book (borrower_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE catalogue (id INT AUTO_INCREMENT NOT NULL, catalogue_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331E8D88425');
        $this->addSql('DROP INDEX IDX_CBE5A331E8D88425 ON book');
        $this->addSql('ALTER TABLE book CHANGE borrower_id_id catalogue_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3314A7843DC FOREIGN KEY (catalogue_id) REFERENCES catalogue (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A3314A7843DC ON book (catalogue_id)');
    }
}
