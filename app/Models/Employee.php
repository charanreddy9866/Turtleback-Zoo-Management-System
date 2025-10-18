<?php
// Employee.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    protected $table = 'Employee';
    protected $primaryKey = 'ID';
    protected $fillable = ['H_ID', 'StartDate', 'JobType', 'FName', 'Minit', 'LName', 'Street', 'City', 'Zip', 'Super_E_ID'];

    // Relationships
    public function jobtype() {
        return $this->belongsTo(JobType::class, 'JobType', 'Name');
    }

    public function supervision() {
        return $this->hasMany(Employee::class, 'Super_E_ID', 'E_ID');
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
