<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250611120448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE forgot_password ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payment ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reset_password_request ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)'
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP created_at, DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP created_at, DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE forgot_password DROP created_at, DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson DROP created_at, DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` DROP created_at, DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payment DROP created_at, DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reset_password_request DROP created_at, DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review DROP created_at, DROP updated_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop DROP created_at, DROP updated_at
        SQL);
    }
}
