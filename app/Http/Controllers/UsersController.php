<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Course;
use App\Department;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Return validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'department_id' => 'required|exists:departments,id',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed'
        ];
    }

    /**
     * Show dashboard.
     */
    public function showDashboard()
    {
        $usersCount = User::count();
        $coursesCount = Course::count();
        $activitiesCount = Activity::where('user_id', Auth::user()->id)->count();

        return view('user.dashboard')->withUsersCount($usersCount)->withCoursesCount($coursesCount)->withActivitiesCount($activitiesCount);
    }

    /**
     * Show the users.
     */
    public function index()
    {
        $users = User::all();

        // Departments
        foreach ($users as $user) {
            $user->department = Department::findOrFail($user->department_id);
        }

        return view('user.users.index')->withUsers($users);
    }

    /**
     * Show a user.
     *
     * @param int $id The id of the user.
     */
    public function edit($id)
    {
        // User
        $user = User::findOrFail($id);

        // All Departments
        $departments = Department::all();

        return view('user.users.edit')->withUser($user)->withDepartments($departments);
    }

    /**
     * Show the form to store a new User.
     */
    public function new()
    {
        $departments = Department::all();

        return view('user.users.new')->withDepartments($departments);
    }
}
