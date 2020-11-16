<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201116230607 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gif_tag (gif_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_8552000FB75C3F80 (gif_id), INDEX IDX_8552000FBAD26311 (tag_id), PRIMARY KEY(gif_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gif_tag ADD CONSTRAINT FK_8552000FB75C3F80 FOREIGN KEY (gif_id) REFERENCES gif (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gif_tag ADD CONSTRAINT FK_8552000FBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE gif_tag');
    }
}
