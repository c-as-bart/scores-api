<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200409122720 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Storage for game results';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE game_result (id UUID NOT NULL, object JSON NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE game_result');
    }
}
