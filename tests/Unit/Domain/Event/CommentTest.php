<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Event;

use App\Domain\Event\Comment;
use App\Domain\Event\Media;
use App\Domain\Event\Participant;
use PHPUnit\Framework\TestCase;

final class CommentTest extends TestCase
{
    public function testGetters(): void
    {
        $participant = $this->createMock(Participant::class);
        $media = $this->createMock(Media::class);
        $createdAt = new \DateTime('2021-12-25');

        $comment = new Comment(
            '9cebe00d-04d8-48da-89b1-059f6b7bfe44',
            'Super soirée !',
            $createdAt,
            $participant,
            $media,
        );

        $this->assertSame('9cebe00d-04d8-48da-89b1-059f6b7bfe44', $comment->getUuid());
        $this->assertSame($media, $comment->getMedia());
        $this->assertSame($participant, $comment->getParticipant());
        $this->assertSame($createdAt, $comment->getCreatedAt());
        $this->assertSame('Super soirée !', $comment->getContent());
    }
}
