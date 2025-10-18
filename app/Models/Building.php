<?php

// Building.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model {
    protected $table = 'Building';
    protected $primaryKey = 'ID';
    protected $fillable = ['Name', 'Type'];

    // Relationships
    public function enclosure() {
        return $this->hasMany(Enclosure::class, 'BuildingID', 'ID');
    }

    public function revenueTypes() {
        return $this->hasMany(RevenueTypes::class, 'BuildingID', 'ID');
    }
}
