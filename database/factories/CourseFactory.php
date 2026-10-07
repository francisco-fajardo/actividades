<?php

namespace Database\Factories;

use App\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "year" => $this->faker->randomElement([
                "1er",
                "2do",
                "3er",
                "4to",
                "5to",
                "6to",
            ]),
            "career" => $this->faker->randomElement([
                "Informática",
                "Comercio",
                "Turismo",
                "Contabilidad",
                "Construcción Civil",
            ]),
            "section" => $this->faker->randomElement(["A", "B", "C", "D", "U"]),
        ];
    }
}
