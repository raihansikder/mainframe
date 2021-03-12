<?php

namespace Tests\Feature\Mainframe\Superadmin;

class LoginTest extends SuperadminTestCase
{

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
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Dashboard');
    }

    /**
     *
     * @return void
     */
    public function testLogout()
    {
        $this->withExceptionHandling();
        $this->followingRedirects()->get('/logout')
            ->assertStatus(200)
            ->assertSee('Login');
    }

}
