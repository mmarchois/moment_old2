<?php

declare(strict_types=1);

namespace App\Domain\Event;

final class Comment
{
    public function __construct(
        private string $uuid,
        private string $content,
        private \DateTimeInterface $createdAt,
        private Participant $participant,
        private Media $media,
    ) {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getParticipant(): Participant
    {
        return $this->participant;
    }

    public function getMedia(): Media
    {
        return $this->media;
    }
}
