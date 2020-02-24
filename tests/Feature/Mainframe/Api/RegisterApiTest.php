<?php

namespace Tests\Feature\Mainframe\Api;

use App\Group;
use Faker\Factory;

class RegisterApiTest extends ApiTestCase
{

    /**
     * @return void
     */
    public function testRegister()
    {

        $faker = Factory::create();
        $groupId = Group::byName('user')->id;
        $firstName = 'pu-'.$faker->firstName;

        $this->response->post('api/core/1.0/register',
            [
                'first_name' => $firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => 'activation1',
                'password_confirmation' => 'activation1',

            ])
            ->assertStatus(200)
            ->assertJsonStructure([
                'code', 'status', 'message'
            ])
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'message' => 'Verify your email and log in.',

            ]);

        // Clean up test entries. This is messy way. But works for now.

        $user = \DB::table('users')->where('first_name', $firstName)->first();
        $this->assertDatabaseHas('user_group', ['user_id' => $user->id, 'group_id' => $groupId]);

        \DB::table('users')->where('name', 'LIKE', 'pu-%')->delete();
        \DB::table('user_group')->where('user_id', $user->id)->delete();

        $this->assertDatabaseMissing('users', ['first_name' => $firstName]);
        $this->assertDatabaseMissing('user_group', ['user_id' => $user->id]);
    }

    /**
     * @return void
     */
    public function testRegisterUser()
    {

        $faker = Factory::create();
        $groupId = Group::byName('user')->id;
        $firstName = 'pu-'.$faker->firstName;

        $this->response->post('api/core/1.0/register/user',
            [
                'first_name' => $firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => 'activation1',
                'password_confirmation' => 'activation1',

            ])
            ->assertStatus(200)
            ->assertJsonStructure([
                'code', 'status', 'message'
            ])
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'message' => 'Verify your email and log in.',

            ]);

        // Clean up test entries. This is messy way. But works for now.

        $user = \DB::table('users')->where('first_name', $firstName)->first();
        $this->assertDatabaseHas('user_group', ['user_id' => $user->id, 'group_id' => $groupId]);

        \DB::table('users')->where('name', 'LIKE', 'pu-%')->delete();
        \DB::table('user_group')->where('user_id', $user->id)->delete();

        $this->assertDatabaseMissing('users', ['first_name' => $firstName]);
        $this->assertDatabaseMissing('user_group', ['user_id' => $user->id]);
    }

    /**
     * @return void
     */
    public function testRegisterTestGroup()
    {

        $faker = Factory::create();
        $groupId = Group::byName('test-group')->id;
        $firstName = 'pu-'.$faker->firstName;

        $this->response->post('api/core/1.0/register/test-group',
            [
                'first_name' => $firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => 'activation1',
                'password_confirmation' => 'activation1',

            ])
            ->assertStatus(200)
            ->assertJsonStructure([
                'code', 'status', 'message'
            ])
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'message' => 'Verify your email and log in.',

            ]);

        // Clean up test entries. This is messy way. But works for now.

        $user = \DB::table('users')->where('first_name', $firstName)->first();
        $this->assertDatabaseHas('user_group', ['user_id' => $user->id, 'group_id' => $groupId]);

        \DB::table('users')->where('name', 'LIKE', 'pu-%')->delete();
        \DB::table('user_group')->where('user_id', $user->id)->delete();

        $this->assertDatabaseMissing('users', ['first_name' => $firstName]);
        $this->assertDatabaseMissing('user_group', ['user_id' => $user->id]);
    }

}
