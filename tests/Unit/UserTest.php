<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_is_not_admin()
    {
        $user = User::factory()->create();

        $this->assertFalse($user->isAdmin);
    }

    /** @test */
    public function user_is_admin()
    {
        $user = User::factory()->create([
            'isAdmin'=>true
        ]);

        $this->assertTrue($user->isAdmin);
    }
}
