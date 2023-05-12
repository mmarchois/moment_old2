<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Event;

use App\Domain\Event\Event;
use App\Domain\Event\Participant;
use PHPUnit\Framework\TestCase;

final class ParticipantTest extends TestCase
{
    public function testGetters(): void
    {
        $event = $this->createMock(Event::class);
        $participant = new Participant(
            '9cebe00d-04d8-48da-89b1-059f6b7bfe44',
            'Mathieu',
            'MARCHOIS',
            '0649927841',
            'xJKJddss',
            $event,
        );

        $this->assertSame('9cebe00d-04d8-48da-89b1-059f6b7bfe44', $participant->getUuid());
        $this->assertSame('Mathieu', $participant->getFirstName());
        $this->assertSame('MARCHOIS', $participant->getLastName());
        $this->assertSame('0649927841', $participant->getPhoneNumber());
        $this->assertSame('xJKJddss', $participant->getVoucher());
        $this->assertSame($event, $participant->getEvent());
    }
}
