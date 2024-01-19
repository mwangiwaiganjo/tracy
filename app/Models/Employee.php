<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_number',
        'departmentId',
        'roleId',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'leave_days',
    ];

    public function department() : BelongsTo{
        return $this->belongsTo(Employee::class , 'departmentId');
    }

    public function role() : BelongsTo{
        return $this->belongsTo(Role::class , 'roleId');
    }
}

