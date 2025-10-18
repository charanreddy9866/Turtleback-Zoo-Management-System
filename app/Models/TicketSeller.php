<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSeller extends Model
{
    protected $table = 'ticketseller';

    // Relationship: BelongsTo with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeID', 'ID');
    }
}
