<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511174054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (uuid UUID NOT NULL, event_uuid UUID NOT NULL, title VARCHAR(50) NOT NULL, from_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, to_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_64C19C1CEB41C0D ON category (event_uuid)');
        $this->addSql('CREATE TABLE comment (uuid UUID NOT NULL, media_uuid UUID NOT NULL, participant_uuid UUID NOT NULL, content VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_9474526C12388F75 ON comment (media_uuid)');
        $this->addSql('CREATE INDEX IDX_9474526C5CB4298 ON comment (participant_uuid)');
        $this->addSql('CREATE TABLE event (uuid UUID NOT NULL, user_uuid UUID NOT NULL, name VARCHAR(100) NOT NULL, from_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, to_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7ABFE1C6F ON event (user_uuid)');
        $this->addSql('CREATE TABLE "like" (uuid UUID NOT NULL, media_uuid UUID NOT NULL, participant_uuid UUID NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_AC6340B312388F75 ON "like" (media_uuid)');
        $this->addSql('CREATE INDEX IDX_AC6340B35CB4298 ON "like" (participant_uuid)');
        $this->addSql('CREATE TABLE media (uuid UUID NOT NULL, event_uuid UUID NOT NULL, participant_uuid UUID NOT NULL, category_uuid UUID DEFAULT NULL, file VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_6A2CA10CCEB41C0D ON media (event_uuid)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C5CB4298 ON media (participant_uuid)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C5AE42AE1 ON media (category_uuid)');
        $this->addSql('CREATE TABLE participant (uuid UUID NOT NULL, event_uuid UUID NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, phone_number VARCHAR(20) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_D79F6B11CEB41C0D ON participant (event_uuid)');
        $this->addSql('CREATE TABLE "user" (uuid UUID NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE UNIQUE INDEX user_email ON "user" (email)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1CEB41C0D FOREIGN KEY (event_uuid) REFERENCES event (uuid) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C12388F75 FOREIGN KEY (media_uuid) REFERENCES media (uuid) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5CB4298 FOREIGN KEY (participant_uuid) REFERENCES participant (uuid) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7ABFE1C6F FOREIGN KEY (user_uuid) REFERENCES "user" (uuid) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "like" ADD CONSTRAINT FK_AC6340B312388F75 FOREIGN KEY (media_uuid) REFERENCES media (uuid) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "like" ADD CONSTRAINT FK_AC6340B35CB4298 FOREIGN KEY (participant_uuid) REFERENCES participant (uuid) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CCEB41C0D FOREIGN KEY (event_uuid) REFERENCES event (uuid) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C5CB4298 FOREIGN KEY (participant_uuid) REFERENCES participant (uuid) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C5AE42AE1 FOREIGN KEY (category_uuid) REFERENCES category (uuid) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B11CEB41C0D FOREIGN KEY (event_uuid) REFERENCES event (uuid) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE category DROP CONSTRAINT FK_64C19C1CEB41C0D');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C12388F75');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C5CB4298');
        $this->addSql('ALTER TABLE event DROP CONSTRAINT FK_3BAE0AA7ABFE1C6F');
        $this->addSql('ALTER TABLE "like" DROP CONSTRAINT FK_AC6340B312388F75');
        $this->addSql('ALTER TABLE "like" DROP CONSTRAINT FK_AC6340B35CB4298');
        $this->addSql('ALTER TABLE media DROP CONSTRAINT FK_6A2CA10CCEB41C0D');
        $this->addSql('ALTER TABLE media DROP CONSTRAINT FK_6A2CA10C5CB4298');
        $this->addSql('ALTER TABLE media DROP CONSTRAINT FK_6A2CA10C5AE42AE1');
        $this->addSql('ALTER TABLE participant DROP CONSTRAINT FK_D79F6B11CEB41C0D');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE "like"');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE "user"');
    }
}
