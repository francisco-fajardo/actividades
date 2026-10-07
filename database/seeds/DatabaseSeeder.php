<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentsSeeder::class);

        if (app()->environment("local")) {
            $department = \App\Department::first();

            // Admin test user
            \App\User::firstOrCreate(
                ["email" => "test@example.com"],
                [
                    "first_name" => "Admin",
                    "last_name" => "Tester",
                    "username" => "admin",
                    "password" => "secret123",
                    "admin" => true,
                    "department_id" => $department->id,
                ]
            );

            // Normal test user
            $user = \App\User::firstOrCreate(
                ["email" => "user@example.com"],
                [
                    "first_name" => "Docente",
                    "last_name" => "Tester",
                    "username" => "docente",
                    "password" => "secret123",
                    "admin" => false,
                    "department_id" => $department->id,
                ]
            );

            // Additional random departments
            if (\App\Department::count() < 12) {
                \App\Department::factory()
                    ->count(3)
                    ->create();
            }

            // Courses
            $courses = \App\Course::factory()
                ->count(5)
                ->create();

            // Test activities
            foreach ($courses as $course) {
                \App\Activity::factory()
                    ->count(2)
                    ->create([
                        "user_id" => $user->id,
                        "course_id" => $course->id,
                    ]);
            }
        }
    }
}
