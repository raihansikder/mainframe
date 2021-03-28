<?php

namespace Tests\Feature\Mainframe\Api;

class RegisterApiTest extends ApiTestCase
{

    # 1. A guest can register
    public function test_a_guest_can_register_as_a_user()
    {
        // Call register api
        $firstName = 'PHPUNIT '.$this->faker->firstName;

        $this->post('api/1.0/register', // Alert! Only write one request in a test function
            [
                'first_name' => $firstName,
                'last_name' => $this->faker->lastName,
                'email' => '1'.$this->faker->email,
                'password' => 'activation1',
                'password_confirmation' => 'activation1',
                // 'group_ids' => [$groupId], // Note: If no group is specified then by default 'user' group will be selected
            ])
            ->assertOk() // Response is Ok (200)
            ->assertJsonStructure(['code', 'status', 'message',]) // Check Json Response Structure
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'message' => 'Verify your email and log in.',
            ]); // Check the JSON content

        $user = $this->newlyRegisteredUser(); // Get this newly created user from database

        $this->seeEmailWasSent()
            ->seeEmailCountEquals(1)
            ->seeEmailTo($user->email, $this->emails[0])
            ->seeEmailSubjectContains('Verify Email Address');
    }

    # 2. An email-unverified user should still be able to log in.
    public function test_unverified_user_can_login()
    {
        $user = $this->newlyRegisteredUser();

        $response = $this->post('api/1.0/login',
            [
                'email' => $user->email,
                'password' => 'activation1',
            ]);

        $response->assertOk()
            ->assertJsonStructure([
                'code', 'status', 'message',
            ])
            ->assertJson([
                'code' => 200,
                'status' => 'success',
            ]);

        $data = $this->payload($response);
        $this->assertEquals('user', $data['type']);
    }

    public function test_user_api_shows_email_verification_msg_for_unverified_user()
    {
        $this->get('api/1.0/user')->assertOk()->assertJson([
            "code" => 401,
            "status" => "fail",
            "message" => "Email not verified or user is not active.",
            "data" => null,
        ]);
    }

    public function test_show_full_user_details_after_verification()
    {
        $this->newlyRegisteredUser()->update(['email_verified_at' => now()]);

        $response = $this->get('api/1.0/user');

        $response->assertOk()->assertJson([
            'code' => 200,
            'status' => 'success',
        ]);
    }

    public function test_user_can_update_his_details()
    {

        $response = $this->patch('api/1.0/user', [
            'first_name' => 'UPDATED',
        ]);

        $response->assertOk()->assertJson([
            'code' => 200,
            'status' => 'success',
        ]);

        $this->assertEquals('UPDATED', $this->newlyRegisteredUser()->first_name);
    }

    // public function test_user_can_update_his_profile_pic()
    // {
    //     // Todo : Need to test upload file
    // }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    |
    */

    public function newlyRegisteredUser()
    {
        return $this->latestUser();
    }

}
