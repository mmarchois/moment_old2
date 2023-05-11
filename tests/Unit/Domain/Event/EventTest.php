<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Event;

use App\Domain\Event\Event;
use App\Domain\User\User;
use PHPUnit\Framework\TestCase;

final class EventTest extends TestCase
{
    public function testGetters(): void
    {
        $fromDate = new \DateTime('2019-01-05');
        $toDate = new \DateTime('2019-01-29');
        $user = $this->createMock(User::class);

        $event = new Event(
            '9cebe00d-04d8-48da-89b1-059f6b7bfe44',
            'Mariage H&M',
            $fromDate,
            $toDate,
            $user,
        );

        $this->assertSame('9cebe00d-04d8-48da-89b1-059f6b7bfe44', $event->getUuid());
        $this->assertSame('Mariage H&M', $event->getName());
        $this->assertSame($fromDate, $event->getFromDate());
        $this->assertSame($toDate, $event->getToDate());
        $this->assertSame($user, $event->getUser());
    }
}
