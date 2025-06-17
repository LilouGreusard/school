<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250613074539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE categories ADD courses_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categories ADD CONSTRAINT FK_3AF34668F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3AF34668F9295384 ON categories (courses_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD user_id INT DEFAULT NULL, ADD review_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C3E2E969B FOREIGN KEY (review_id) REFERENCES review (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_A9A55A4CA76ED395 ON courses (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A9A55A4C3E2E969B ON courses (review_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payment ADD orders_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payment ADD CONSTRAINT FK_6D28840DCFFE9AD6 FOREIGN KEY (orders_id) REFERENCES `order` (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6D28840DCFFE9AD6 ON payment (orders_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop ADD category_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA212469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_AC6A4CA212469DE2 ON shop (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD review_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD CONSTRAINT FK_1483A5E93E2E969B FOREIGN KEY (review_id) REFERENCES review (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1483A5E93E2E969B ON users (review_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668F9295384
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3AF34668F9295384 ON categories
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categories DROP courses_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4CA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C3E2E969B
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_A9A55A4CA76ED395 ON courses
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A9A55A4C3E2E969B ON courses
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP user_id, DROP review_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DCFFE9AD6
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_6D28840DCFFE9AD6 ON payment
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payment DROP orders_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA212469DE2
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_AC6A4CA212469DE2 ON shop
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop DROP category_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP FOREIGN KEY FK_1483A5E93E2E969B
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_1483A5E93E2E969B ON users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP review_id
        SQL);
    }
}
