<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLoggedInUser()
    {
        $user = User::find(5);

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/')->assertSee('raihan');
    }

    public function testUserCanLogin()
    {
        $this->post('/login', ['email' => 'raihan@yantrait.com', 'password' => '8eyesnlegs'])->assertRedirect('/home');
        $this->get('/')->assertSee('raihan@yantrait.com');
    }

}
