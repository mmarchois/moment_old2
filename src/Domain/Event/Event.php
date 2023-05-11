<?php

declare(strict_types=1);

namespace App\Domain\Event;

use App\Domain\User\User;

final class Event
{
    public function __construct(
        private string $uuid,
        private string $name,
        private \DateTimeInterface $fromDate,
        private \DateTimeInterface $toDate,
        private User $user,
    ) {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFromDate(): \DateTimeInterface
    {
        return $this->fromDate;
    }

    public function getToDate(): \DateTimeInterface
    {
        return $this->toDate;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
