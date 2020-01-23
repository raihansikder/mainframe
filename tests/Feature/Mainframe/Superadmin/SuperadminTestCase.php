<?php

namespace Tests\Feature\Mainframe\Superadmin;

use Tests\TestCase;
use App\Mainframe\Modules\Users\User;

class SuperadminTestCase extends TestCase
{
    public $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = user(1);
        $this->be($this->user); // Impersonate as the currently created admin user
    }

}
