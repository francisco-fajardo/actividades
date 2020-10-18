<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Activity;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
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
        $activities = Activity::where('user_id', Auth::user()->id)->get();

        foreach ($activities as $activity) {
            $activity->course = Course::findOrFail($activity->course_id);
        }

        return view('user.activities.index')->withActivities($activities);
    }
}
