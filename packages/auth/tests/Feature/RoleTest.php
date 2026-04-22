<?php

namespace Cars\Auth\Tests\Feature;

use AI\Auth\Models\Role;
use AI\Auth\Models\User;
use AI\Auth\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_checks_guests_can_not_create_role()
    {
        $this->get(route('auth.roles.create'))
            ->assertRedirect(route('login'));

        $this->post(route('auth.roles.store'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function it_checks_authenticated_user_can_create_role()
    {
        $this->actingAs(User::factory()->create());

        $role = Role::factory()->make();

        $response = $this->post(route('auth.roles.store'), $role->toArray());

        $response->assertRedirect(route('auth.roles.index'))
            ->assertSessionHasNoErrors();
    }

    /** @test */
    public function a_role_requires_a_name()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->post(route('auth.roles.store'), ['name' => null]);

        $response->assertSessionHasErrors('name');
    }
}
