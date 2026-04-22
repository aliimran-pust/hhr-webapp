<?php

namespace Cars\Auth\Tests\Feature;

use AI\Auth\Models\Permission;
use AI\Auth\Models\Role;
use AI\Auth\Models\User;
use AI\Auth\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolePermissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_checks_guests_can_not_create_role_permission()
    {
        $this->get(route('auth.rp.index'))
            ->assertRedirect(route('login'));

        $this->get(route('auth.rp.update', 1))
            ->assertRedirect(route('login'));

        $this->put(route('auth.rp.update', 1))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function it_check_authenticate_user_can_create_role_permission()
    {
        $this->actingAs(User::factory()->create());

        $role = Role::factory()->create();

        $permissions = Permission::factory()->count(3)->create();

        $role->permissions()->sync($permissions);

        $this->assertDatabaseHas($role->permissions()->getTable(), [
            'role_id' => $role->id,
            'permission_id' => Permission::first()->id,
        ]);

        $this->assertDatabaseCount($role->permissions()->getTable(), 3);
    }

    /** @test */
    public function it_checks_role_permission_requires_permissions()
    {
        $this->actingAs(User::factory()->create());

        $this->put(route('auth.rp.update', 1), [])
            ->assertSessionHasErrors('permissions');
    }
}
