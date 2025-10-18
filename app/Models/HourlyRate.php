<?php
// HourlyRate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HourlyRate extends Model {
    protected $primaryKey = 'H_ID';
    protected $fillable = ['RATE'];

    // Relationships
    public function employees() {
        return $this->hasMany(Employee::class, 'H_ID');
    }
}
