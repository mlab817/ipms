<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_stores_user()
    {
        $user = User::factory()->make();

        $response = $this->post(route('users.store'), $user);

        $response->assertStatus(201);
    }
}
