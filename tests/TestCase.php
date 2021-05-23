<?php

namespace Tests;

use Faker\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, MailTracking, TestHelperTrait;

    /** @var \Faker\Generator */
    public $faker;

    public $password = 'activation1';

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        $this->faker = Factory::create();
        // usleep(100000);
    }

}
