<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request): View
    {
        $employee = new Employee;
        $employee->save();
        return view('welcome')->with('status', 'Employee created successfully');
    }
}
