<?php

namespace Tests\Feature\Mainframe\Superadmin;

use Tests\TestCase;
use App\Mainframe\Modules\Users\User;

class LoginTest extends TestCase
{

    /**
     * @var \Tests\Feature\Mainframe\Superadmin\LoginTest
     */
    public $response;
    public $superadmin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->superadmin = User::find(1);
        $this->be($this->superadmin); // Impersonate as the currently created admin user
    }

    /**
     * @return void
     */
    public function testRedirectedToDashboardFromLogin()
    {
        $this->followingRedirects()->get('/login')
            ->assertStatus(200)
            ->assertSee('Dashboard');
    }

    /**
     *
     * @return void
     */
    public function testShowDashboard()
    {
        $this->get('/')->assertStatus(200)
            ->assertSee('Dashboard');
    }

    /**
     *
     * @return void
     */
    public function testLogout()
    {
        $this->followingRedirects()->get('/logout')
            ->assertStatus(200)
            ->assertSee('Login');
    }


}
