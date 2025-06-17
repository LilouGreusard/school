<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250613072228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE categories ADD parent_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categories ADD CONSTRAINT FK_3AF34668727ACA70 FOREIGN KEY (parent_id) REFERENCES categories (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3AF34668727ACA70 ON categories (parent_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD category_id INT DEFAULT NULL, ADD courses_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD CONSTRAINT FK_1483A5E912469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1483A5E912469DE2 ON users (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_1483A5E9F9295384 ON users (courses_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668727ACA70
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3AF34668727ACA70 ON categories
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categories DROP parent_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP FOREIGN KEY FK_1483A5E912469DE2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9F9295384
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_1483A5E912469DE2 ON users
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_1483A5E9F9295384 ON users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP category_id, DROP courses_id
        SQL);
    }
}
