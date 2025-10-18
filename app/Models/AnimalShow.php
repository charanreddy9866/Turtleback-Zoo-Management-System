<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalShow extends Model
{
    protected $table = 'AnimalShow';
    protected $primaryKey = 'ID';
    protected $fillable = ['Name', 'Type', 'AdultPrice', 'SeniorPrice', 'ChildPrice', 'PerDay'];

    public function concession()
    {
        return $this->hasMany(Concession::class, 'AnimalShowID', 'ID');
    }
}
