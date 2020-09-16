<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;
    /**
     * Testing Create an user
     */
    public function testCreateUser()
    {
        $user = User::factory(2)->create();
        $this->assertDatabaseHas('users', [
            'email' => $user[0]->email
        ]);
    }

    /**
     * Testing Update an existing user
     */
    public function testUpdateUser()
    {
        $user = User::find(1);

        $data = [
            'name' => 'helo',
            'email' => 'emailchange@email.com',
            'password' => password_hash('password1', PASSWORD_DEFAULT)
        ];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->save();
        $this->assertDatabaseHas('users', $data);
    }

    public function testDeleteUser()
    {
        $user = User::find(1);
        $user->delete();
        $this->assertDeleted($user);
        $this->assertDatabaseMissing('users', ['email' => $user->email]);

    }
}
