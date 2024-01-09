<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Role;
use Livewire\Component;

class AddEmployee extends Component
{
    public $deptId;
    public $roles = [];
    public $departments = [];


    public function render()
    {
        $this->departments = Department::all();
        $this->roles = Role::all();
        return view('livewire.add-employee' , ['departments' => $this->departments , 'roles' => $this->roles]);
    }
}
