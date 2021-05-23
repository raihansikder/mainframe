<?php

namespace Tests\Feature\Mainframe\Superadmin;

use Tests\TestCase;
use App\User;

class SuperadminTestCase extends TestCase
{
    public $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
        $this->user = User::remember(timer('long'))->find(env('SUPERADMIN_USER_ID'));
        $this->be($this->user); // Impersonate as the currently created admin user
    }

}
