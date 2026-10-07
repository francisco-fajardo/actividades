<?php

namespace Database\Factories;

use App\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Department>
 */
class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ucfirst($this->faker->unique()->words(2, true));
        return [
            "name" => $name,
            "description" => "Departamento de " . $name,
        ];
    }
}
