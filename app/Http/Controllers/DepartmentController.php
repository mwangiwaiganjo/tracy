<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function store(Request $request){

        $validator = $request->validate([
            'department_name' => 'required|string',
        ]);

        Department::create($validator);

        return redirect("/")->with('Add_Dept' , 'Department added successfully');
    }
}
