<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;


    /**
     * Testing Create an user
     */
    public function testCreateUser()
    {
        $user = factory(User::class)->create();
        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email
        ]);
    }

    /**
     * Testing Update an existing user
     */
    public function testUpdateUser()
    {
        $user = factory(User::class)->create();

        $data = [
            'name' => 'helo',
            'email' => 'emailchange@email.com',
            'password' => password_hash('password1',PASSWORD_DEFAULT)
        ];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->save();
        $this->assertDatabaseHas('users',$data);
    }
}
