<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Course;

class CoursesController extends Controller
{
    /**
     * Get all Courses.
     */
    public function index()
    {
        $courses = Course::all();

        // Activities Count
        foreach ($courses as $course) {
            $course->activity_count = Activity::where('course_id', $course->id)->count();
        }

        return view('courses.index')->withCourses($courses);
    }
}
