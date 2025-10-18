<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'maintenance';

    // Relationship: BelongsTo with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID', 'ID');
    }
}
