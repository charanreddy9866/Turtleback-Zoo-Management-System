<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    //public $timestamps = false; // Disable timestamps
    protected $table = 'JobType';
    protected $primaryKey = 'ID'; // Change the primary key to 'ID'
    public $incrementing = true; // Indicate that the primary key is auto-incrementing
    protected $fillable = ['ID', 'Name', 'HourlyRate'];
    public function employee() {
        return $this->hasMany(Employee::class, 'JobType', 'Name');
    }
    // Relationship: One-to-Many with customerservice
    public function customerServices()
    {
        return $this->hasMany(CustomerService::class, 'EmployeeID', 'ID');
    }
    public function employeeattendance()
    {
        return $this->hasMany(EmployeeAttendance::class, 'EmployeeID', 'ID');
    }
    public function maintenance()
    {
        return $this->hasMany(Maintenance::class, 'EmployeeID', 'ID');
    }
    public function ticketseller()
    {
        return $this->hasMany(TicketSeller::class, 'EmployeeID', 'ID');
    }
    public function veterinarian()
    {
        return $this->hasMany(Veterinarian::class, 'EmployeeID', 'ID');
    }
    public function animalCarespecialist()
    {
        return $this->hasMany(AnimalCareSpecialist::class, 'EmployeeID', 'ID');
    }
}
