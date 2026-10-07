<?php

namespace Database\Factories;

use App\Department;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "email" => $this->faker->unique()->safeEmail(),
            "department_id" => Department::factory(),
            "username" => $this->faker->unique()->userName(),
            "password" => "secret123",
            "admin" => false,
        ];
    }

    /**
     * Indicate that the user is an administrator.
     */
    public function admin()
    {
        return $this->state(
            fn(array $attributes) => [
                "admin" => true,
            ]
        );
    }
}
