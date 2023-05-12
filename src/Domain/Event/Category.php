<?php

declare(strict_types=1);

namespace App\Domain\Event;

final class Category
{
    public function __construct(
        private string $uuid,
        private string $title,
        private \DateTimeInterface $fromDate,
        private \DateTimeInterface $toDate,
        private Event $event,
    ) {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getFromDate(): \DateTimeInterface
    {
        return $this->fromDate;
    }

    public function getToDate(): \DateTimeInterface
    {
        return $this->toDate;
    }

    public function getEvent(): Event
    {
        return $this->event;
    }
}
