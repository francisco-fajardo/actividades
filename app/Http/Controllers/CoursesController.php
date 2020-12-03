<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Return the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "year" => "required",
            "career" => "required",
            "section" => "nullable",
        ];
    }

    /**
     * Get all Courses.
     */
    public function index()
    {
        $courses = Course::orderBy("year", "asc")
            ->orderBy("career", "asc")
            ->get();

        // Activities Count
        foreach ($courses as $course) {
            $course->activity_count = Activity::where(
                "course_id",
                $course->id
            )->count();
        }

        return view("courses.index")->withCourses($courses);
    }

    /**
     * Get all Courses in the Dashboard.
     */
    public function userIndex()
    {
        return view("user.courses.index")->withCourses(
            Course::orderBy("year", "asc")
                ->orderBy("career", "asc")
                ->get()
        );
    }

    /**
     * Show Form to Store a Course.
     */
    public function new()
    {
        return view("user.courses.new");
    }

    /**
     * Store a new Course.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        Course::create($request->all());

        return redirect(route("user.courses.index"));
    }

    /**
     * Show Form to Edit a Course.
     *
     * @param int $Id The id of the Course.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view("user.courses.edit")->withCourse($course);
    }

    /**
     * Update a Course.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The id of the Course.
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules());

        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect(route("user.courses.index"));
    }

    /**
     * Delete a Course.
     *
     * @param int $id The id of the Course.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect(route("user.courses.index"));
    }
}
