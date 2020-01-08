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
        // Impersonate as the currently created admin user
        $this->be($this->superadmin);
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
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowDashboard()
    {
        $this->get('/')->assertStatus(200)
            ->assertSee('Dashboard');
    }


}
