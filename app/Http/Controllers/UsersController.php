<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use App\User;

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

        return view('user.dashboard')->withUsersCount($usersCount)->withCoursesCount($coursesCount);
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
    public function show($id)
    {
        // User
        $user = User::findOrFail($id);

        // All Departments
        $departments = Department::all();

        return view('user.users.show')->withUser($user)->withDepartments($departments);
    }
}
