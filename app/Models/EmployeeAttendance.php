<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    protected $table = 'employeeattendance';

    // Relationship: BelongsTo with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID', 'ID');
    }
}