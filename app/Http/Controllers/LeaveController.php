<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    //

    public function index(Request $request){
        return view('leave.new');
    }

    public function store(Request $request){

        dd("sadsd");
        $validator = $request->validate([
            'start_date'=> 'required|date',
            'end_date'=> 'required|date',
            'employee_number'=> 'required|integer',
            'period_of_days'=> 'required|string',
            'remaining_days'=> 'required|string',

        ]);
        $period_of_days = explode(" " , $validator['period_of_days']);
        $remaining_days = explode(" " , $validator['remaining_days']);
        $employee = Employee::where('employee_number' , $request->input('employee_number'))->first();
        if(!$employee){
            return redirect()->back()->with('no_employee' , 'No employee with that number was found');
        }

        $leave = Leave::create([
            'start_date' => $validator['start_date'],
            'end_date' => $validator['end_date'],
            'employeeId' => $employee->id,
            'period_of_days' => $period_of_days[0],
            'remaining_days' => $remaining_days[0],

        ]);

        dd("done");




    }
}
