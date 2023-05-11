<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Event;

use App\Domain\Event\Category;
use App\Domain\Event\Event;
use App\Domain\Event\Media;
use App\Domain\Event\Participant;
use PHPUnit\Framework\TestCase;

final class MediaTest extends TestCase
{
    public function testGetters(): void
    {
        $createdAt = new \DateTime('2019-01-05');
        $participant = $this->createMock(Participant::class);
        $event = $this->createMock(Event::class);
        $category = $this->createMock(Category::class);

        $media = new Media(
            '9cebe00d-04d8-48da-89b1-059f6b7bfe44',
            's3:url',
            $createdAt,
            $event,
            $participant,
            $category,
        );

        $this->assertSame('9cebe00d-04d8-48da-89b1-059f6b7bfe44', $media->getUuid());
        $this->assertSame('s3:url', $media->getFile());
        $this->assertSame($createdAt, $media->getCreatedAt());
        $this->assertSame($event, $media->getEvent());
        $this->assertSame($participant, $media->getParticipant());
        $this->assertSame($category, $media->getCategory());
    }
}
