<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveController extends Controller
{
    //

    public function index(Request $request){
        return view('leave.new');
    }
}
