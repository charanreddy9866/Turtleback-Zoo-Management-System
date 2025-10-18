<?php

// Attraction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model {
    protected $primaryKey = 'AR_ID';
    protected $fillable = ['SeniorPrice', 'AdultPrice', 'ChildPrice', 'PerDay'];

    // Relationships
    public function participatesIn() {
        return $this->hasMany(ParticipatesIn::class, 'AR_ID');
    }
}
