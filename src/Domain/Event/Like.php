<?php

declare(strict_types=1);

namespace App\Domain\Event;

final class Like
{
    public function __construct(
        private string $uuid,
        private Participant $participant,
        private Media $media,
    ) {
    }

    public function getUuid(): string
    {
        return $this->uuid;
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
