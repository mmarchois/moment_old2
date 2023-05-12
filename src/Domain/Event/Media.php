<?php

declare(strict_types=1);

namespace App\Domain\Event;

final class Media
{
    public function __construct(
        private string $uuid,
        private string $file,
        private \DateTimeInterface $createdAt,
        private Event $event,
        private Participant $participant,
        private ?Category $category = null,
    ) {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getEvent(): Event
    {
        return $this->event;
    }

    public function getParticipant(): Participant
    {
        return $this->participant;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }
}
