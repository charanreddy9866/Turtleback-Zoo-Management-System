<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueEvent extends Model
{
    protected $table = 'RevenueEvents';
    protected $primaryKey = 'ID';
    protected $fillable = ['Date', 'Revenue', 'TicketsSold', 'RevenueTypeID'];
    

    // Relationship: BelongsTo with Employee
    public function revenuetypes()
    {
        return $this->belongsTo(RevenueTypes::class, 'RevenueTypeID', 'ID');
    }
}
