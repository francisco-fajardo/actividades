<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Course;
use App\Department;
use App\User;
use Illuminate\Http\Request;
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
            'password' => 'required|confirmed',
            // 'admin' => 'nullable|boolean'
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
     * Show the form to update a User.
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
     * Update a user.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The id of the User.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'department_id' => 'required|exists:departments,id',
            'username' => 'required'
        ]);

        $user = User::findOrFail($id);
        $input = $request->all();
        $input['admin'] = $request->input('admin') === 'on';
        $user->update($input);

        return redirect(route('user.users.index'));
    }

    /**
     * Show the form to store a new User.
     */
    public function new()
    {
        $departments = Department::all();

        return view('user.users.new')->withDepartments($departments);
    }

    /**
     * Store a new user.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        $input = $request->all();
        $input['admin'] = $request->input('admin') === 'on';
        User::create($input);

        return redirect(route('user.users.index'));
    }

    /**
     * Delete a User.
     *
     * @param int $id The id of the user.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('user.users.index'));
    }
}
