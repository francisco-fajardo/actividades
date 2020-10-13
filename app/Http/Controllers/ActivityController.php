<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use App\Course;

class ActivityController extends Controller
{
    /**
     * Return the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required',
            'activity' => 'required',
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id'
        ];
    }

    /**
     * Get an Activity.
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

    /**
     * Show Activity Form to Store an Activity.
     */
    public function showStoreForm()
    {
        $courses = Course::all();

        return view('user.activity.new')->withCourses($courses);
    }

    /**
     * Store an new Activity.
     */
    public function store()
    {

    }
}
