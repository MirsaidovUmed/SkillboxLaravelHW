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
        $workData = json_decode($request->input('workData'), true);

        if (json_last_error() === JSON_ERROR_NONE) {
            $employee->workData = json_encode($workData);
            $employee->street = $workData['address']['street'] ?? null;
            $employee->suite = $workData['address']['suite'] ?? null;
            $employee->city = $workData['address']['city'] ?? null;
            $employee->zipcode = $workData['address']['zipcode'] ?? null;
            $employee->lat = $workData['address']['geo']['lat'] ?? null;
            $employee->lng = $workData['address']['geo']['lng'] ?? null;
        }

        $employee->save();

        return redirect()->route('getEmployeeData')->with('status', 'Data Added for Employee');
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
        $workData = json_decode($request->input('workData'), true);

        if (json_last_error() === JSON_ERROR_NONE) {
            $employee->workData = json_encode($workData);
            $employee->street = $workData['address']['street'] ?? null;
            $employee->suite = $workData['address']['suite'] ?? null;
            $employee->city = $workData['address']['city'] ?? null;
            $employee->zipcode = $workData['address']['zipcode'] ?? null;
            $employee->lat = $workData['address']['geo']['lat'] ?? null;
            $employee->lng = $workData['address']['geo']['lng'] ?? null;
        }

        $employee->update();

        return redirect()->route('getEmployeeData')->with('status', 'Data Updated for Employee');
    }
    
    public function destroy(int $id): RedirectResponse
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('getEmployeeData')->with('status','Employee deleted successfully');
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
