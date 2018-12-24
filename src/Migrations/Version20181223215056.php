<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181223215056 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE sirali_kur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, usd CLOB NOT NULL --(DC2Type:json)
        , eur CLOB NOT NULL --(DC2Type:json)
        , gbp CLOB NOT NULL --(DC2Type:json)
        )');
        $this->addSql('CREATE TABLE ucuz_kur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, usd_rate DOUBLE PRECISION NOT NULL, usd_api_url VARCHAR(255) NOT NULL, eur_rate DOUBLE PRECISION NOT NULL, eur_api_url VARCHAR(255) NOT NULL, gbp_rate DOUBLE PRECISION NOT NULL, gbp_api_url VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE sirali_kur');
        $this->addSql('DROP TABLE ucuz_kur');
    }
}
