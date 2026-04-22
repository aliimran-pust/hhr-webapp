<?php

namespace Cars\Auth\Tests\Feature;

use AI\Auth\Models\Permission;
use AI\Auth\Models\User;
use AI\Auth\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_checks_guests_can_not_create_permission()
    {
        $this->get(route('auth.permissions.create'))
            ->assertRedirect(route('login'));

        $this->post(route('auth.permissions.store'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function it_checks_authenticated_user_can_create_permission()
    {
        $this->actingAs(User::factory()->create());

        $role = Permission::factory()->make();

        $response = $this->post(route('auth.permissions.store'), $role->toArray());

        $response->assertRedirect(route('auth.permissions.index'))
            ->assertSessionHasNoErrors();
    }

    /** @test */
    public function a_permission_requires_a_name()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->post(route('auth.permissions.store'), ['name' => null]);

        $response->assertSessionHasErrors('name');
    }
}
