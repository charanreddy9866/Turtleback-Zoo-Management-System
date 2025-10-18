<?php

// Animal.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model {
    protected $table = 'Animal';
    protected $primaryKey = 'ID';
    protected $fillable = ['Name', 'SpeciesID', 'Status', 'BirthYear', 'FoodCost', 'EnclosureID'];

    // Relationships
    public function species() {
        return $this->belongsTo(Species::class, 'SpeciesID');
    }

    public function enclosure() {
        return $this->belongsTo(Enclosure::class, 'EnclosureID');
    }
}
