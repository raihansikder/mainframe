<?php

namespace Tests\Feature\Mainframe\Auth;

use App\Group;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{

    /**
     * Guest can see registration page
     *
     * @return void
     */
    public function test_see_registration_page()
    {

        $this->get('register')
            ->assertStatus(200)
            ->assertSee('User Registration')->assertSeeInOrder([
                'Email Address',
                'Password',
                'Confirm Password',
                'Register',
            ]);
    }

    /**
     * @return void
     */
    public function test_guest_can_register_to_default_user_group()
    {

        $groupId = Group::byName('user')->id;

        $firstName = 'PHPUNIT '.$this->faker->firstName;

        $this->followingRedirects()
            ->post('register', [
                'first_name' => $firstName,
                'last_name' => $this->faker->lastName,
                'email' => $this->faker->email,
                'password' => $this->password,
                'password_confirmation' => $this->password,
                // 'group_ids' => [$groupId], // Note: If no group is specified then by default 'user' group will be selected
            ])
            ->assertStatus(200)
            ->assertSee('Verify your email and log in.');

        $user = $this->newlyRegisteredUser(); // Get this newly created user from database

        $this->seeEmailWasSent()
            ->seeEmailCountEquals(1)
            ->seeEmailTo($user->email, $this->emails[0])
            ->seeEmailSubjectContains('Verify Email Address');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email_verified_at' => null,
            'group_ids' => "[\"26\"]",
        ]);

        echo "User #{$user->id} : {$user->email} created";
    }

    public function test_unverified_user_can_login_but_see_verification_prompt()
    {
        $user = $this->newlyRegisteredUser(); // Get this newly created user from database

        $this->followingRedirects()
            ->post('login', [
                'email' => $user->email,
                'password' => $this->password,
            ])
            ->assertStatus(200)
            ->assertSee('Email verification required');
    }

    public function test_guest_cannot_see_resend_verification_code_page()
    {
        $this->withExceptionHandling();
        // Guest is redirected to login
        $this->get('email/verify')->assertRedirect('login');

    }

    public function test_unverified_user_can_resend_verification_code_link()
    {

        $user = $this->newlyRegisteredUser(); // Get this newly created user from database

        $this->be($user);

        $this->followingRedirects()
            ->post('email/resend')
            ->assertStatus(200)
            ->assertSee('Email verification required')// ->assertDontSee("<button type=\"submit\">Resend verification link</button>")
        ;
        // Note: In above I couldn't capture session('resent') which conditionally renders a
        //  Different message in the HTML.

        $this->seeEmailWasSent()
            ->seeEmailCountEquals(1)
            ->seeEmailTo($user->email, $this->emails[0])
            ->seeEmailSubjectContains('Verify Email Address');
    }

    public function test_verified_user_can_see_dashboard_upon_login()
    {

        $user = $this->newlyRegisteredUser();
        $user->update(['email_verified_at' => now()]); // Force verify
        $this->be($user);

        $this->followingRedirects()->get('email/verify')->assertSee('Dashboard');

    }

    public function test_verified_user_can_login_and_see_dashboard()
    {
        $user = $this->newlyRegisteredUser(); // Get this newly created user from database

        $this->followingRedirects()
            ->post('login', [
                'email' => $user->email,
                'password' => $this->password,
            ])
            ->assertStatus(200)
            ->assertSee('Dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public function newlyRegisteredUser()
    {
        return $this->latestUser();
    }

}
