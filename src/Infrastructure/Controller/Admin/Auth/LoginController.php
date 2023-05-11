<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Admin\Auth;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class LoginController
{
    public function __construct(
        private \Twig\Environment $twig,
        private AuthenticationUtils $authenticationUtils,
    ) {
    }

    #[Route('/auth/login', name: 'admin_login', methods: ['GET', 'POST'])]
    public function __invoke(): Response
    {
        $error = $this->authenticationUtils->getLastAuthenticationError();
        $lastUsername = $this->authenticationUtils->getLastUsername();

        return new Response(
            $this->twig->render(
                name: 'admin/auth/login.html.twig',
                context: [
                    'last_username' => $lastUsername,
                    'error' => $error,
                ],
            ),
        );
    }
}
