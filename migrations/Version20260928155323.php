<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260928155323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_favorite_item DROP CONSTRAINT fk_1f93917155e38587');
        $this->addSql('DROP INDEX idx_1f93917155e38587');
        $this->addSql('DROP INDEX UNIQ_ITEM_PER_USER');
        $this->addSql('ALTER TABLE user_favorite_item RENAME COLUMN item_id_id TO item_id');
        $this->addSql('ALTER TABLE user_favorite_item ADD CONSTRAINT FK_1F939171126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1F939171126F525E ON user_favorite_item (item_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ITEM_PER_USER ON user_favorite_item (user_id, item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_favorite_item DROP CONSTRAINT FK_1F939171126F525E');
        $this->addSql('DROP INDEX IDX_1F939171126F525E');
        $this->addSql('DROP INDEX uniq_item_per_user');
        $this->addSql('ALTER TABLE user_favorite_item RENAME COLUMN item_id TO item_id_id');
        $this->addSql('ALTER TABLE user_favorite_item ADD CONSTRAINT fk_1f93917155e38587 FOREIGN KEY (item_id_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_1f93917155e38587 ON user_favorite_item (item_id_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_item_per_user ON user_favorite_item (user_id, item_id_id)');
    }
}
