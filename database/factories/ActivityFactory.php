<?php

namespace Database\Factories;

use App\Activity;
use App\Course;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Activity>
 */
class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "subject" => $this->faker->words(3, true),
            "activity" => "<p>" . $this->faker->paragraphs(3, true) . "</p>",
            "user_id" => User::factory(),
            "course_id" => Course::factory(),
        ];
    }
}
