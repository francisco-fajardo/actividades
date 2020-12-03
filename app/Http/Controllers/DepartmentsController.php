<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Return the validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "description" => "nullable",
        ];
    }

    /**
     * Get all Departments.
     */
    public function index()
    {
        return view("user.departments.index")->withDepartments(
            Department::all()
        );
    }

    /**
     * Show Department Form to Store an Department.
     */
    public function new()
    {
        return view("user.departments.new");
    }

    /**
     * Store a new Department.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        Department::create($request->all());

        return redirect(route("user.departments.index"));
    }

    /**
     * Show the form to edit a Department.
     *
     * @param int $id The id of the Department.
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view("user.departments.edit")->withDepartment($department);
    }

    /**
     * Update a Department.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The id of the Department.
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules());

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect(route("user.departments.index"));
    }

    /**
     * Delete a Department.
     *
     * @param int $id The id of the Department to delete.
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect(route("user.departments.index"));
    }
}
