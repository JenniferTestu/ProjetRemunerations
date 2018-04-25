<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180425124732 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE objectif (id INT AUTO_INCREMENT NOT NULL, prime_id INT DEFAULT NULL, commercial_id INT DEFAULT NULL, objectif INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, vente_atteinte DOUBLE PRECISION DEFAULT NULL, type VARCHAR(100) NOT NULL, proportionnel_inf TINYINT(1) NOT NULL, proportionnel_sup TINYINT(1) NOT NULL, recompense DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_E2F8685169247986 (prime_id), INDEX IDX_E2F868517854071C (commercial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prime (id INT AUTO_INCREMENT NOT NULL, prime DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, commercial_id INT DEFAULT NULL, date DATETIME NOT NULL, quantite INT NOT NULL, ca DOUBLE PRECISION NOT NULL, INDEX IDX_888A2A4C7854071C (commercial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE objectif ADD CONSTRAINT FK_E2F8685169247986 FOREIGN KEY (prime_id) REFERENCES prime (id)');
        $this->addSql('ALTER TABLE objectif ADD CONSTRAINT FK_E2F868517854071C FOREIGN KEY (commercial_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C7854071C FOREIGN KEY (commercial_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD responsable_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64953C59D72 FOREIGN KEY (responsable_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64953C59D72 ON user (responsable_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE objectif DROP FOREIGN KEY FK_E2F8685169247986');
        $this->addSql('DROP TABLE objectif');
        $this->addSql('DROP TABLE prime');
        $this->addSql('DROP TABLE vente');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64953C59D72');
        $this->addSql('DROP INDEX IDX_8D93D64953C59D72 ON user');
        $this->addSql('ALTER TABLE user DROP responsable_id');
    }
}
