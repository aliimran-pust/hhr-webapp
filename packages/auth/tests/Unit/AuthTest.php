<?php

namespace AI\Auth\Tests\Unit;

use AI\Auth\Models\Role;
use AI\Auth\Models\User;
use Illuminate\Support\Str;
use AI\Auth\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function shows_login_page_for_root_route()
    {
        $response = $this->get('/');

        $response->assertSee('email')
            ->assertSee('password');
    }

    /** @test */
    public function it_checks_admin_user_can_add_role()
    {
        $user = User::factory()->create();

        $role = Role::factory()->create([
            'name' => 'Super Admin',
            'slug' => Str::slug('Super Admin'),
        ]);

        $user->roles()->attach(['role_id' => $role->id]);

        $this->assertDatabaseHas((new User)->roles()->getTable(), [
            'user_id' => $user->id,
            'role_id' => $role->id,
        ]);
    }
}
