<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Event;

use App\Domain\Event\Like;
use App\Domain\Event\Media;
use App\Domain\Event\Participant;
use PHPUnit\Framework\TestCase;

final class LikeTest extends TestCase
{
    public function testGetters(): void
    {
        $participant = $this->createMock(Participant::class);
        $media = $this->createMock(Media::class);

        $like = new Like(
            '9cebe00d-04d8-48da-89b1-059f6b7bfe44',
            $participant,
            $media,
        );

        $this->assertSame('9cebe00d-04d8-48da-89b1-059f6b7bfe44', $like->getUuid());
        $this->assertSame($media, $like->getMedia());
        $this->assertSame($participant, $like->getParticipant());
    }
}
