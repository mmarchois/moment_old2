<?php

declare(strict_types=1);

namespace App\Domain\Event\Repository;

use App\Domain\Event\Participant;

interface ParticipantRepositoryInterface
{
    public function add(Participant $participant): void;

    public function findOneByToken(string $token): ?Participant;

    public function findOneByEmail(string $email): ?Participant;

    public function findOneByEventAndPhoneNumber(string $eventUuid, string $phoneNumber): ?Participant;

    public function findByEvent(string $eventUuid, int $page = 1): array;
}
