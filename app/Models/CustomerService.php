<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    protected $table = 'customerservice';

    // Relationship: BelongsTo with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID', 'ID');
    }
}
