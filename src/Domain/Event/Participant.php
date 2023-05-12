<?php

declare(strict_types=1);

namespace App\Domain\Event;

final class Participant
{
    public function __construct(
        private string $uuid,
        private string $firstName,
        private string $lastName,
        private string $phoneNumber,
        private string $voucher,
        private Event $event,
    ) {
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getVoucher(): string
    {
        return $this->voucher;
    }

    public function getEvent(): Event
    {
        return $this->event;
    }
}
