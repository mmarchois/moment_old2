<?php

declare(strict_types=1);

namespace App\Domain\Event\Repository;

use App\Domain\Event\Category;

interface CategoryRepositoryInterface
{
    public function add(Category $category): void;

    public function findByEventAndPeriod(Category $category): ?Category;

    public function findByEvent(string $eventUuid, int $page): array;
}
