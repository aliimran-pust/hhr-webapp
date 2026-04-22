<?php

namespace AI\Auth\Database\Factories;

use Illuminate\Support\Str;
use AI\Auth\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'label' => $this->faker->sentence()
        ];
    }
}
