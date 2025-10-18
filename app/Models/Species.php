<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
   /*  protected $table = 'Species';
    protected $primaryKey = 'ID'; */
    protected $fillable = ['Name', 'AverageFoodCost'];
    public function animal()
    {
        return $this->hasMany(Animal::class, 'SpeciesID');
    }
}
