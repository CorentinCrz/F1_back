<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190321162016 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE circuits (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(50) NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(100) NOT NULL, country VARCHAR(100) NOT NULL, lat DOUBLE PRECISION NOT NULL, lng DOUBLE PRECISION NOT NULL, alt DOUBLE PRECISION DEFAULT NULL, url VARCHAR(2000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE constructor_results (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, constructor_id INT NOT NULL, points INT NOT NULL, INDEX IDX_86B4E7266E59D40D (race_id), INDEX IDX_86B4E7262D98BF9 (constructor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE constructors (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(50) NOT NULL, name VARCHAR(255) NOT NULL, nationality VARCHAR(50) NOT NULL, url VARCHAR(2000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE constructor_standings (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, constructor_id INT NOT NULL, points INT NOT NULL, position INT NOT NULL, wins INT NOT NULL, INDEX IDX_E71E13BB6E59D40D (race_id), INDEX IDX_E71E13BB2D98BF9 (constructor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE drivers (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(50) NOT NULL, number INT NOT NULL, code VARCHAR(5) NOT NULL, forename VARCHAR(50) NOT NULL, surname VARCHAR(50) NOT NULL, dob DATE NOT NULL, nationality VARCHAR(50) NOT NULL, url VARCHAR(2000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE driver_standings (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, driver_id INT NOT NULL, points INT NOT NULL, position INT NOT NULL, wins INT NOT NULL, INDEX IDX_BC45047E6E59D40D (race_id), INDEX IDX_BC45047EC3423909 (driver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lap_times (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, driver_id INT NOT NULL, lap INT NOT NULL, position INT NOT NULL, time TIME NOT NULL, milliseconds INT NOT NULL, INDEX IDX_8A5AB5A36E59D40D (race_id), INDEX IDX_8A5AB5A3C3423909 (driver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pit_stops (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, driver_id INT NOT NULL, stop INT NOT NULL, lap INT NOT NULL, time TIME NOT NULL, duration DOUBLE PRECISION NOT NULL, milliseconds INT NOT NULL, INDEX IDX_C3665A486E59D40D (race_id), INDEX IDX_C3665A48C3423909 (driver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qualifyings (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, driver_id INT NOT NULL, constructor_id INT NOT NULL, number INT NOT NULL, position INT NOT NULL, q1 TIME NOT NULL, q2 TIME NOT NULL, q3 TIME NOT NULL, INDEX IDX_5B81B69A6E59D40D (race_id), INDEX IDX_5B81B69AC3423909 (driver_id), INDEX IDX_5B81B69A2D98BF9 (constructor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE races (id INT AUTO_INCREMENT NOT NULL, circuit_id INT NOT NULL, year INT NOT NULL, round INT NOT NULL, name VARCHAR(255) NOT NULL, date DATE NOT NULL, time TIME NOT NULL, url VARCHAR(2000) NOT NULL, INDEX IDX_5DBD1EC9CF2182C8 (circuit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE results (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, driver_id INT NOT NULL, constructor_id INT NOT NULL, status_id INT DEFAULT NULL, number INT NOT NULL, grid INT NOT NULL, position INT NOT NULL, position_order INT NOT NULL, points INT NOT NULL, laps INT NOT NULL, time TIME NOT NULL, milliseconds INT NOT NULL, fastest_lap INT NOT NULL, rank INT NOT NULL, fastest_lap_time TIME NOT NULL, fastest_lap_speed DOUBLE PRECISION NOT NULL, INDEX IDX_9FA3E4146E59D40D (race_id), INDEX IDX_9FA3E414C3423909 (driver_id), INDEX IDX_9FA3E4142D98BF9 (constructor_id), INDEX IDX_9FA3E4146BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seasons (id INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, url VARCHAR(2000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE constructor_results ADD CONSTRAINT FK_86B4E7266E59D40D FOREIGN KEY (race_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE constructor_results ADD CONSTRAINT FK_86B4E7262D98BF9 FOREIGN KEY (constructor_id) REFERENCES constructors (id)');
        $this->addSql('ALTER TABLE constructor_standings ADD CONSTRAINT FK_E71E13BB6E59D40D FOREIGN KEY (race_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE constructor_standings ADD CONSTRAINT FK_E71E13BB2D98BF9 FOREIGN KEY (constructor_id) REFERENCES constructors (id)');
        $this->addSql('ALTER TABLE driver_standings ADD CONSTRAINT FK_BC45047E6E59D40D FOREIGN KEY (race_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE driver_standings ADD CONSTRAINT FK_BC45047EC3423909 FOREIGN KEY (driver_id) REFERENCES drivers (id)');
        $this->addSql('ALTER TABLE lap_times ADD CONSTRAINT FK_8A5AB5A36E59D40D FOREIGN KEY (race_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE lap_times ADD CONSTRAINT FK_8A5AB5A3C3423909 FOREIGN KEY (driver_id) REFERENCES drivers (id)');
        $this->addSql('ALTER TABLE pit_stops ADD CONSTRAINT FK_C3665A486E59D40D FOREIGN KEY (race_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE pit_stops ADD CONSTRAINT FK_C3665A48C3423909 FOREIGN KEY (driver_id) REFERENCES drivers (id)');
        $this->addSql('ALTER TABLE qualifyings ADD CONSTRAINT FK_5B81B69A6E59D40D FOREIGN KEY (race_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE qualifyings ADD CONSTRAINT FK_5B81B69AC3423909 FOREIGN KEY (driver_id) REFERENCES drivers (id)');
        $this->addSql('ALTER TABLE qualifyings ADD CONSTRAINT FK_5B81B69A2D98BF9 FOREIGN KEY (constructor_id) REFERENCES constructors (id)');
        $this->addSql('ALTER TABLE races ADD CONSTRAINT FK_5DBD1EC9CF2182C8 FOREIGN KEY (circuit_id) REFERENCES circuits (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E4146E59D40D FOREIGN KEY (race_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E414C3423909 FOREIGN KEY (driver_id) REFERENCES drivers (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E4142D98BF9 FOREIGN KEY (constructor_id) REFERENCES constructors (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E4146BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE races DROP FOREIGN KEY FK_5DBD1EC9CF2182C8');
        $this->addSql('ALTER TABLE constructor_results DROP FOREIGN KEY FK_86B4E7262D98BF9');
        $this->addSql('ALTER TABLE constructor_standings DROP FOREIGN KEY FK_E71E13BB2D98BF9');
        $this->addSql('ALTER TABLE qualifyings DROP FOREIGN KEY FK_5B81B69A2D98BF9');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E4142D98BF9');
        $this->addSql('ALTER TABLE driver_standings DROP FOREIGN KEY FK_BC45047EC3423909');
        $this->addSql('ALTER TABLE lap_times DROP FOREIGN KEY FK_8A5AB5A3C3423909');
        $this->addSql('ALTER TABLE pit_stops DROP FOREIGN KEY FK_C3665A48C3423909');
        $this->addSql('ALTER TABLE qualifyings DROP FOREIGN KEY FK_5B81B69AC3423909');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E414C3423909');
        $this->addSql('ALTER TABLE constructor_results DROP FOREIGN KEY FK_86B4E7266E59D40D');
        $this->addSql('ALTER TABLE constructor_standings DROP FOREIGN KEY FK_E71E13BB6E59D40D');
        $this->addSql('ALTER TABLE driver_standings DROP FOREIGN KEY FK_BC45047E6E59D40D');
        $this->addSql('ALTER TABLE lap_times DROP FOREIGN KEY FK_8A5AB5A36E59D40D');
        $this->addSql('ALTER TABLE pit_stops DROP FOREIGN KEY FK_C3665A486E59D40D');
        $this->addSql('ALTER TABLE qualifyings DROP FOREIGN KEY FK_5B81B69A6E59D40D');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E4146E59D40D');
        $this->addSql('ALTER TABLE results DROP FOREIGN KEY FK_9FA3E4146BF700BD');
        $this->addSql('DROP TABLE circuits');
        $this->addSql('DROP TABLE constructor_results');
        $this->addSql('DROP TABLE constructors');
        $this->addSql('DROP TABLE constructor_standings');
        $this->addSql('DROP TABLE drivers');
        $this->addSql('DROP TABLE driver_standings');
        $this->addSql('DROP TABLE lap_times');
        $this->addSql('DROP TABLE pit_stops');
        $this->addSql('DROP TABLE qualifyings');
        $this->addSql('DROP TABLE races');
        $this->addSql('DROP TABLE results');
        $this->addSql('DROP TABLE seasons');
        $this->addSql('DROP TABLE status');
    }
}
