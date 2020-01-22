<?php

namespace Tests\Feature\Mainframe\Superadmin;

use Tests\TestCase;
use App\Mainframe\Modules\Users\User;

class SuperadminTestCase extends TestCase
{
    public $superadmin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->superadmin = user(1);
        $this->be($this->superadmin); // Impersonate as the currently created admin user
    }

}
