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
        return view('courses.index')->withCourses(Course::all());
    }

    /**
     * Get a Course.
     *
     * @param int $id The id of the Course.
     */
    public function show($id)
    {
        // Course
        $course = Course::findOrFail($id);

        // Activities Count
        $activitiesCount = Activity::where('course_id', $id)->count();

        return view('courses.show')->withCourse($course)->withActivitiesCount($activitiesCount);
    }
}
