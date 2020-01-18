<?php

namespace Tests\Feature\Mainframe\Auth;

use App\Group;
use Faker\Factory;
use Tests\TestCase;
use App\Mainframe\Modules\Users\User;

class UserRegistrationTest extends TestCase
{

    /** @var User */
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

    }

    /**
     * @return void
     */
    public function testSeeRegistrationPage()
    {

        $this->get('register')
            ->assertStatus(200)
            ->assertSee('User Registration');
    }

    /**
     * @return void
     */
    public function testRegister()
    {

        $faker = Factory::create();
        $groupId = Group::byName('user')->id;

        $this->followingRedirects()
            ->post('register', [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => 'activation1',
                'password_confirmation' => 'activation1',
                'group_ids' => [$groupId],
            ])
            ->assertStatus(200)
            ->assertSee('Verify your email and log in.');
    }

}
