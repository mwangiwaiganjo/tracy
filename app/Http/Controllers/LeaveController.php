<?php

namespace App\Http\Controllers;

use App\Mail\LeaveMail;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeaveController extends Controller
{
    //

    public function index(Request $request)
    {
        return view('leave.new');
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'employee_number' => 'required|string',
            'period_of_days' => 'required|string',

        ]);
        $period_of_days = explode(" ", $validator['period_of_days']);


        $employee = Employee::where('employee_number', $request->input('employee_number'))->first();
        if (!$employee) {
            return redirect()->back()->with('no_employee', 'No employee with that number was found');
        }

        $leave = Leave::where('employeeId', $employee->id);

        if($employee->leave_days <= 0 ){
            return redirect("/leave")->with('exhaust', 'You have exhausted your leave days!!!');
        }
        if ($leave && $employee->leave_days > 0) {
            $updatedLeaveDays = $employee->leave_days - (int)$period_of_days[0];
            $isUpdated = $employee->update(['leave_days' => $updatedLeaveDays]);
            $leave = Leave::create([
                'start_date' => $validator['start_date'],
                'end_date' => $validator['end_date'],
                'employeeId' => $employee->id,
                'period_of_days' => $period_of_days[0]

            ]);
            Mail::to("edwardkabwoy@gmail.com")->send(new LeaveMail($employee->first_name , $employee->last_name , (string) $employee->leave_days , (string) $validator['start_date'] ,  (string) $validator['end_date'] ));
            return redirect("/leave")->with('approved', 'Leave Approved , Email has been sent to the employee');
        }


        $leave = Leave::create([
            'start_date' => $validator['start_date'],
            'end_date' => $validator['end_date'],
            'employeeId' => $employee->id,
            'period_of_days' => $period_of_days[0]
        ]);

        return redirect("/leave")->with('approved', 'leave approved');
    }
}
