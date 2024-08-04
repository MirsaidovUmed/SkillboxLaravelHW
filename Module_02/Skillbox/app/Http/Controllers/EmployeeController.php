<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::all();
        return view('get-employee-data', compact('employees'));
    }

    public function showForm(): View
    {
        return view('form');
    }

    public function store(Request $request): RedirectResponse
    {
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->email = $request->input('email');
        $employee->position = $request->input('position');
        $employee->address = $request->input('address');
        $employee->workData = $request->input('workData');
        $employee->save();

        $employeeData = [
            'id' => $employee->id,
            'name' => $employee->name,
            'surname' => $employee->surname,
            'email' => $employee->email,
            'position' => $employee->position,
            'address' => $employee->address,
            'workData' => $employee->workData
        ];

        return redirect()->route('getEmployeeData', ['employee' => $employeeData])->with('status','Data Added for Employee');
    }

    public function edit(int $id): View
    {
        $employee = Employee::findOrFail($id);
        return view('edit-employee', compact('employee'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $employee = Employee::findOrFail($id);    
        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->email = $request->input('email');
        $employee->position = $request->input('position');
        $employee->address = $request->input('address');
        $employee->workData = $request->input('workData');
        $employee->update();

        $employeeData = [
            'id' => $employee->id,
            'name' => $employee->name,
            'surname' => $employee->surname,
            'email' => $employee->email,
            'position' => $employee->position,
            'address' => $employee->address,
            'workData' => $employee->workData
        ];

        return redirect()->route('getEmployeeData', ['employee' => $employeeData])->with('status','Data Updated for Employee');
    }

    public function getPath(Request $request): string
    {
        return $request->path();
    }
    
    public function getUrl(Request $request): string
    {
        return $request->url();
    }
}
