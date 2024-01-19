<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'departmentId'
    ];

    public function department():BelongsTo{
        return $this->belongsTo(Department::class , 'departmentId');
    }

    public function employee():HasMany{
        return $this->hasMany(Employee::class);
    }
}
