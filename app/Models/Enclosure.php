<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    protected $table = 'enclosure';

    public function building()
    {
        return $this->belongsTo(Building::class, 'BuildingID', 'ID');
    }
}
