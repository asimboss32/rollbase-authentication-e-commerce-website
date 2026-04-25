<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
     public function dashboard()
    {
        return view('employee.employee-dashboard');
    }

    public function employeeLogout()
    {
        Auth()->logout(); //eta user ke logout korbe.
        return redirect('/employee/login'); //logout er por Login page e niye jabe.
    }
}
