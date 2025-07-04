<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250613073042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD courses_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526CF9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9474526CF9295384 ON comment (courses_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD comment_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1483A5E9F8697D13 ON users (comment_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF9295384
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_9474526CF9295384 ON comment
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP courses_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9F8697D13
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_1483A5E9F8697D13 ON users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP comment_id
        SQL);
    }
}
