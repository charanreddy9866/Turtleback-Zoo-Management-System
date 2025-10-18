<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinarian extends Model
{
    protected $table = 'veterinarian';

    protected $primaryKey = 'ID';
    // Relationship: BelongsTo with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID', 'ID');
    }
}
