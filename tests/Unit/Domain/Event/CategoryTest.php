<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Event;

use App\Domain\Event\Category;
use App\Domain\Event\Event;
use PHPUnit\Framework\TestCase;

final class CategoryTest extends TestCase
{
    public function testGetters(): void
    {
        $from = new \DateTime('2021-11-22 11:30:00');
        $to = new \DateTime('2021-11-22 11:45:00');
        $event = $this->createMock(Event::class);

        $category = new Category(
            '9cebe00d-04d8-48da-89b1-059f6b7bfe44',
            'Cérémonie religieuse',
            $from,
            $to,
            $event,
        );

        $this->assertSame('9cebe00d-04d8-48da-89b1-059f6b7bfe44', $category->getUuid());
        $this->assertSame('Cérémonie religieuse', $category->getTitle());
        $this->assertSame($from, $category->getFromDate());
        $this->assertSame($to, $category->getToDate());
        $this->assertSame($event, $category->getEvent());
    }
}
