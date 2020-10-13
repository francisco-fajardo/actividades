<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use App\Course;

class ActivityController extends Controller
{
    /**
     * Get a Activity.
     *
     * @param int $id The id of the Activity.
     */
    public function show($id)
    {
        // Activity
        $activity = Activity::findOrFail($id);

        // User
        $user = User::findOrFail($activity->user_id);

        // Course
        $course = Course::findOrFail($activity->course_id);

        return view('activity.show')->withActivity($activity)->withUser($user)->withCourse($course);
    }
}
