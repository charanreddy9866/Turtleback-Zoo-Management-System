<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueTypes extends Model
{
    protected $table = 'RevenueTypes';
    protected $primaryKey = 'ID';


    public function revenueevents()
    {
        return $this->hasMany(RevenueEvents::class, 'RevenueTypeID', 'ID');
    }
}
