<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211009124504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_D95AB4056596F871 ON user_profile');
        $this->addSql('ALTER TABLE user_profile ADD status INT DEFAULT 0 NOT NULL, ADD status2 INT DEFAULT 0 NOT NULL, DROP access, DROP reputation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_profile ADD access INT NOT NULL, ADD reputation INT NOT NULL, DROP status, DROP status2');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95AB4056596F871 ON user_profile (profile_pic)');
    }
}
