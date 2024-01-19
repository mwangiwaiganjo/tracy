<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //

    public function store(Request $request){

       $validator = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'departmentId' => 'required|string',
        'phone_number' => 'required|string',
        'email' => 'required|string|email',
        'roleId' => 'required|string',
        'employee_number' => 'required|string',
        ]);

       Employee::create($validator);

       return redirect("/")->with('employee_number' , 'Employee added');
    }
}
