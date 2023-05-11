<?php

declare(strict_types=1);

namespace App\Domain\Event\Repository;

use App\Domain\Event\Event;

interface EventRepositoryInterface
{
    public function add(Event $event): void;

    public function findOneByUuid(string $uuid): ?Event;

    public function findEventsByOrganizer(string $organizerUuid, int $page): array;
}
