<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DashboardController
{
    public function __construct(
        private \Twig\Environment $twig,
    ) {
    }

    #[Route(name: 'admin_dashboard', methods: ['GET'])]
    public function __invoke(): Response
    {
        return new Response(
            content: $this->twig->render(
                name: 'admin/dashboard.html.twig',
            ),
        );
    }
}
