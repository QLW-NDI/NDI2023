<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207212659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__question AS SELECT id, question, answer_false, theme, answer_true, explication, nb_click_true, nb_click_false FROM question');
        $this->addSql('DROP TABLE question');
        $this->addSql('CREATE TABLE question (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, question CLOB NOT NULL, answer_false CLOB NOT NULL, theme VARCHAR(255) NOT NULL, answer_true CLOB NOT NULL, explanation CLOB NOT NULL, nb_click_true INTEGER NOT NULL, nb_click_false INTEGER NOT NULL)');
        $this->addSql('INSERT INTO question (id, question, answer_false, theme, answer_true, explanation, nb_click_true, nb_click_false) SELECT id, question, answer_false, theme, answer_true, explication, nb_click_true, nb_click_false FROM __temp__question');
        $this->addSql('DROP TABLE __temp__question');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__question AS SELECT id, theme, question, answer_false, answer_true, explanation, nb_click_true, nb_click_false FROM question');
        $this->addSql('DROP TABLE question');
        $this->addSql('CREATE TABLE question (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, theme VARCHAR(255) NOT NULL, question CLOB NOT NULL, answer_false CLOB NOT NULL, answer_true CLOB NOT NULL, explication CLOB NOT NULL, nb_click_true INTEGER NOT NULL, nb_click_false INTEGER NOT NULL)');
        $this->addSql('INSERT INTO question (id, theme, question, answer_false, answer_true, explication, nb_click_true, nb_click_false) SELECT id, theme, question, answer_false, answer_true, explanation, nb_click_true, nb_click_false FROM __temp__question');
        $this->addSql('DROP TABLE __temp__question');
    }
}
