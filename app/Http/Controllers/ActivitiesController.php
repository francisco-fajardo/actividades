<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Activity;

class ActivitiesController extends Controller
{
    /**
     * Get all Activities.
     */
    public function index()
    {
        return view('activities.index')->withCourses(Activity::all());
    }

    /**
     * Get Activities from a Course.
     *
     * @param int $id The id of the Course.
     */
    public function show($id)
    {
        // Course
        $course = Course::findOrFail($id);

        // Activities
        $activities = Activity::where('course_id', $id)->get();

        // Users
        foreach ($activities as $activity) {
            $activity->user = User::findOrFail($activity->user_id);
        }

        return view('activities.show')->withCourse($course)->withActivities($activities);
    }

    /**
     * User's all activities.
     */
    public function userIndex()
    {
        return view('user.activities');
    }
}
