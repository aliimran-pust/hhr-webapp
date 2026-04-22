<?php

namespace AI\Auth\Database\Factories;

use AI\Auth\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$qDHwUP3kBmDvc2cwoTKiyuc0iWY8W3EMFvds88rgbMJddZ4Gi0hE6', // password
            'remember_token' => Str::random(10),
            'status' => random_int(0,2),
        ];
    }
}
