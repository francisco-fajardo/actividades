<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use App\Course;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

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
    public function new()
    {
        $courses = Course::all();

        return view('user.activity.new')->withCourses($courses);
    }

    /**
     * Store an new Activity.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        Activity::create($input);

        return redirect(route('user.activities.index'));
    }

    /**
     * Show the edit to edit a Activity.
     *
     * @param int $id The id of the Activity.
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        if ($activity->user_id !== Auth::user()->id && Auth::user()->isAdmin()) throw new UnauthorizedHttpException('Esta actividad no la puedes editar');

        $departments = Department::all();
        $courses = Course::all();

        return view('user.activity.edit')->withActivity($activity)->withDepartments($departments)->withCourses($courses);
    }

    /**
     * Update a activity.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The id of the Activity.
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules());

        $input = $request->all();
        $activity = Activity::findOrFail($id);
        if ($activity->user_id !== Auth::user()->id && Auth::user()->isAdmin()) throw new UnauthorizedHttpException('Esta actividad no la puedes editar');
        $input['user_id'] = Auth::user()->id;
        $activity->update($input);

        return redirect(route('user.activities.index'));
    }

    /**
     * Delete a Activity.
     *
     * @param int $id The id of the activity to delete.
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        if ($activity->user_id !== Auth::user()->id && Auth::user()->isAdmin()) throw new UnauthorizedHttpException('Esta actividad no la puedes eliminar');
        $activity->delete();

        return redirect(route('user.activities.index'));
    }
}
