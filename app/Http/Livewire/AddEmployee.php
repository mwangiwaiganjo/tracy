<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Livewire\Component;

class AddEmployee extends Component
{
    public function render()
    {
        $departments = Department::all();
        return view('livewire.add-employee' , ['departments' => $departments]);
    }
}
