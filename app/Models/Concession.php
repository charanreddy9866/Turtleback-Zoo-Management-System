<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concession extends Model
{
    protected $table = 'concession';

    // Relationship: BelongsTo with Employee
    public function animalshow()
    {
        return $this->belongsTo(AnimalShow::class, 'AnimalShowID', 'ID');
    }
}
