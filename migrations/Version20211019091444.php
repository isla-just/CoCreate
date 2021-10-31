<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211019091444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer ADD question_id_id INT NOT NULL, ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_3E7B0BFB4FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_3E7B0BFB9D86650F FOREIGN KEY (user_id_id) REFERENCES user_profile (id)');
        $this->addSql('CREATE INDEX IDX_3E7B0BFB4FAF8F53 ON answer (question_id_id)');
        $this->addSql('CREATE INDEX IDX_3E7B0BFB9D86650F ON answer (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_3E7B0BFB4FAF8F53');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_3E7B0BFB9D86650F');
        $this->addSql('DROP INDEX IDX_3E7B0BFB4FAF8F53 ON answer');
        $this->addSql('DROP INDEX IDX_3E7B0BFB9D86650F ON answer');
        $this->addSql('ALTER TABLE answer DROP question_id_id, DROP user_id_id');
    }
}
