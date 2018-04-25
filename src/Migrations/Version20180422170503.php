<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180422170503 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, quantite INT NOT NULL, ca DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE objectif ADD prime_id INT DEFAULT NULL, ADD type VARCHAR(100) NOT NULL, ADD proportionnel_inf TINYINT(1) NOT NULL, ADD proportionnel_sup TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE objectif ADD CONSTRAINT FK_E2F8685169247986 FOREIGN KEY (prime_id) REFERENCES prime (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E2F8685169247986 ON objectif (prime_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE vente');
        $this->addSql('ALTER TABLE objectif DROP FOREIGN KEY FK_E2F8685169247986');
        $this->addSql('DROP INDEX UNIQ_E2F8685169247986 ON objectif');
        $this->addSql('ALTER TABLE objectif DROP prime_id, DROP type, DROP proportionnel_inf, DROP proportionnel_sup');
    }
}
