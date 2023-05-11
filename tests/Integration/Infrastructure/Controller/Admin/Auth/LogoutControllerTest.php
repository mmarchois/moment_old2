<?php

declare(strict_types=1);

namespace App\Tests\Integration\Infrastructure\Controller\Admin\Auth;

use App\Tests\Integration\Infrastructure\Controller\AbstractWebTestCase;

final class LogoutControllerTest extends AbstractWebTestCase
{
    public function testLogout(): void
    {
        $client = $this->login();
        $client->request('GET', '/admin/auth/logout');

        $this->assertResponseStatusCodeSame(302);
        $client->followRedirect();
        $this->assertRouteSame('admin_login');
    }
}
