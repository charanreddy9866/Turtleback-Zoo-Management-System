<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Employee;
use App\Models\AnimalShow;
use App\Models\Building;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('asset.index');
    }

    public function employees()
    {
        //
        
        $employees = DB::select('SELECT * FROM Employee');
        $jobTypes = collect(DB::select('SELECT * FROM JobType'));

        foreach ($employees as $employee) {
            $employee->JobType = $jobTypes->first(function ($value) use ($employee) {
                return $value->Name === $employee->JobType;
            });
        }
        return view('asset.employees')->with('employees', $employees);
    }

    public function attractions()
    {
        //
        
        $attractions = DB::select('SELECT * FROM AnimalShow');
       
        return view('attractions.index')->with('attractions', $attractions);
    }

    

    public function animals()
    {
        //
        
        $animals = DB::select('SELECT * FROM animal');

        $species = collect(DB::select('SELECT * FROM Species'));
            $enclosures = collect(DB::select('SELECT * FROM Enclosure'));

            foreach ($animals as $animal) {
                $animal->Species = $species->first(function ($value) use ($animal) {
                    return $value->ID === $animal->SpeciesID;
                });
                $animal->Enclosure = $enclosures->first(function ($value) use ($animal) {
                    return $value->ID === $animal->EnclosureID;
                });
            }
       
        return view('animals.index')->with('animals', $animals);
    }

    public function buildings()
    {
        //
        
        $buildings = DB::select('SELECT * FROM Building');
       
        return view('buildings.index')->with('buildings', $buildings);
    }

    public function wages()
    {
        //
        
        $wages = DB::select('SELECT * FROM JobType');
       
        return view('wages.index')->with('wages', $wages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addemployees()
    {
        //
        return view('asset.addemployees');
    }

    public function addattractions()
    {
        //
        return view('attractions.addattractions');
    }
    
    public function addanimals()
    {
        //
        return view('animals.addanimals');
    }

    public function addbuildings()
    {
        //
        return view('buildings.addbuildings');
    }
    
    public function addwages()
    {
        //
        return view('wages.addwages');
    }
    
    /* store employee*/
    public function storeemployee(Request $request)
{
    // Validation for the required fields
    $this->validate($request, [
        'First' => 'required',
        'Last' => 'required',
        'JobType' => 'required|in:animalCarespecialist,customerServices,employeeattendance,maintenance,ticketseller,veterinarian',
        'StartDate' => 'required',
        'Address' => 'required',
        'City' => 'required',
        'State' => 'required',
        'Zip' => 'required',
    ]);

    // Check if the selected JobType exists
    $jobTypeExists = DB::table('JobType')->where('Name', $request->input('JobType'))->exists();

    if (!$jobTypeExists) {
        // If the JobType doesn't exist, insert it into the JobType table
        DB::table('JobType')->insert(['Name' => $request->input('JobType'), 'HourlyRate' => 0.0]);
    }

    // Now insert the employee record
    $employees = new Employee();
    $employees->First = $request->input('First');
    $employees->Last = $request->input('Last');
    $employees->JobType = $request->input('JobType');
    $employees->StartDate = $request->input('StartDate');
    $employees->Address = $request->input('Address');
    $employees->City = $request->input('City');
    $employees->State = $request->input('State');
    $employees->Zip = $request->input('Zip');

    $employees->save();

    return redirect('employees')->with('success', 'Employee Created Successfully!');
}

/* store attractions*/
public function storeattraction(Request $request)
{
    // Validation for the required fields
     
    // Now insert the attraction record
    $attractions = new  AnimalShow();
    $attractions->Name = $request->input('Name');
    $attractions->Type = $request->input('Type');
    $attractions->AdultPrice = $request->input('AdultPrice');
    $attractions->SeniorPrice = $request->input('SeniorPrice');
    $attractions->ChildPrice = $request->input('ChildPrice');
    $attractions->PerDay = $request->input('PerDay');

    $attractions->save();

    return redirect('attractions')->with('success', 'Attraction Created Successfully!');
}

public function storeanimal(Request $request)
{
    // Validation for the required fields
    $this->validate($request, [
        'Name' => 'required',
        'Status' => 'required|in:Healthy,Injured',
        'Species' => 'required',
        'BirthYear' => 'required',
        'FoodCost' => 'required',
        'RegistrationDate' => 'required',
    ]);

    // Check if the selected species exists
    $species = DB::table('Species')->where('Name', $request->input('Species'))->first();

    if (!$species) {
        // If the Species doesn't exist, insert it into the Species table
        $speciesId = DB::table('Species')->insertGetId(['Name' => $request->input('Species'), 'AverageFoodCost' => 0.00]);
        
        // Fetch the inserted species
        $species = DB::table('Species')->find($speciesId);
    }

    // Now insert the animal record
    $animals = new Animal();
    $animals->Name = $request->input('Name');
    $animals->Status = $request->input('Status');
    $animals->SpeciesID = $species->ID; // Use the obtained ID
    $animals->BirthYear = $request->input('BirthYear');
    $animals->FoodCost = $request->input('FoodCost');
    $animals->created_at = $request->input('RegistrationDate');

    $animals->save();

    return redirect('animals')->with('success', 'Animal Created Successfully!');
}

public function storebuilding(Request $request)
{
    // Validation for the required fields
   

    // Now insert the building record
    $buildings = new Building();
    $buildings->Name = $request->input('Name');
    $buildings->Type = $request->input('Type');
   
    $buildings->save();

    return redirect('buildings')->with('success', 'building Created Successfully!');
}


public function storewage(Request $request)
{
    
    $this->validate($request, [
        
        'Name' => 'required|in:animalCarespecialist,customerServices,employeeattendance,maintenance,ticketseller,veterinarian',
        'HourlyRate' => 'required',
        
    ]);
    

    // Now insert the employee record
    $employees = new JobType();
    $employees->Name = $request->input('Name');
    $employees->HourlyRate = $request->input('HourlyRate');
    
    
    $employees->save();

    return redirect('wages')->with('success', 'Wage Created Successfully!');
}
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function editemployee($id)
    {
        //
        $employees = Employee::find($id);
        
       /*  $employees = DB::select('SELECT * FROM Employee'); */
       $jobTypes = DB::table('JobType')->get();
        /* foreach ($employees as $employee) {
            $employee->JobType = $jobTypes->first(function ($value) use ($employee) {
                return $value->Name === $employee->JobType;
            });
        } */
        return view('asset.editemployee')->with('employees', $employees)->with('jobTypes', $jobTypes);
    }

    public function editattraction($id)
    {
        //
        $attraction = AnimalShow::find($id);
        
       
        return view('attractions.editattraction')->with('attraction', $attraction);
    }

    public function editanimal($id)
    {
        //
        $animal = Animal::find($id);
        
       
        return view('animals.editanimal')->with('animal', $animal);
    }

    public function editbuilding($id)
    {
        //
        $building = Building::find($id);
        
       
        return view('buildings.editbuilding')->with('building', $building);
    }

    public function editwage($id)
    {
        //
        $wage = JobType::find($id);
        
       
        return view('wages.editwage')->with('wage', $wage);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateemployee(Request $request, $id)
    {
        //
         // Validation for the required fields
    /* $this->validate($request, [
        'First' => 'required',
        'Last' => 'required',
        'JobType' => 'required|in:animalCarespecialist,customerServices,employeeattendance,maintenance,ticketseller,veterinarian',
        'StartDate' => 'required',
        'Address' => 'required',
        'City' => 'required',
        'State' => 'required',
        'Zip' => 'required',
    ]); */

    // Check if the selected JobType exists
    $jobTypeExists = DB::table('JobType')->where('Name', $request->input('JobType'))->exists();

    if (!$jobTypeExists) {
        // If the JobType doesn't exist, insert it into the JobType table
        DB::table('JobType')->insert(['Name' => $request->input('JobType'), 'HourlyRate' => 0.0]);
    }

    // Now insert the employee record
    $employees = Employee::find($id);
    $employees->First = $request->input('First');
    $employees->Last = $request->input('Last');
    $employees->JobType = $request->input('JobType');
    $employees->StartDate = $request->input('StartDate');
    $employees->Address = $request->input('Address');
    $employees->City = $request->input('City');
    $employees->State = $request->input('State');
    $employees->Zip = $request->input('Zip');

    $employees->save();

    return redirect('employees')->with('success', 'Employee Updated Successfully!');
    }

    public function updateattraction(Request $request, $id)
{
    // Validation for the required fields
     
    // Now insert the attraction record
    $attractions = AnimalShow::find($id);
    $attractions->Name = $request->input('Name');
    $attractions->Type = $request->input('Type');
    $attractions->AdultPrice = $request->input('AdultPrice');
    $attractions->SeniorPrice = $request->input('SeniorPrice');
    $attractions->ChildPrice = $request->input('ChildPrice');
    $attractions->PerDay = $request->input('PerDay');

    $attractions->save();

    return redirect('attractions')->with('success', 'Attraction Updated Successfully!');
}

public function updateanimal(Request $request, $id)
{
     // Validation for the required fields
     $this->validate($request, [
        'Name' => 'required',
        'Status' => 'required|in:Healthy,Injured',
        'Species' => 'required',
        'BirthYear' => 'required',
        'FoodCost' => 'required',
        'RegistrationDate' => 'required',
    ]);

    // Check if the selected species exists
    $species = DB::table('Species')->where('Name', $request->input('Species'))->first();

    if (!$species) {
        // If the Species doesn't exist, insert it into the Species table
        $speciesId = DB::table('Species')->insertGetId(['Name' => $request->input('Species'), 'AverageFoodCost' => 0.00]);
        
        // Fetch the inserted species
        $species = DB::table('Species')->find($speciesId);
    }

    // Now insert the animal record
    $animals = Animal::find($id);
    $animals->Name = $request->input('Name');
    $animals->Status = $request->input('Status');
    $animals->SpeciesID = $species->ID; // Use the obtained ID
    $animals->BirthYear = $request->input('BirthYear');
    $animals->FoodCost = $request->input('FoodCost');
    $animals->created_at = $request->input('RegistrationDate');

    $animals->save();

    return redirect('animals')->with('success', 'animal Updated Successfully!');
}

public function updatebuilding(Request $request, $id)
{
    // Validation for the required fields
   

    // Now insert the building record
    $buildings = Building::find($id);
    $buildings->Name = $request->input('Name');
    $buildings->Type = $request->input('Type');
   
    $buildings->save();

    return redirect('buildings')->with('success', 'building updated Successfully!');
}

public function updatewage(Request $request, $id)
{
    
    $this->validate($request, [
        
        'Name' => 'required|in:animalCarespecialist,customerServices,employeeattendance,maintenance,ticketseller,veterinarian',
        'HourlyRate' => 'required',
        
    ]);
    

    // Now insert the employee record
    $employees = JobType::find($id);
    $employees->Name = $request->input('Name');
    $employees->HourlyRate = $request->input('HourlyRate');
    
    
    $employees->save();

    return redirect('wages')->with('success', 'Wage Updated Successfully!');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
     public function destroyemployee($id)
     {
         $employee = Employee::find($id);
     
         if ($employee) {
             // Delete related records in the customerservice table
             $employee->customerServices()->delete();
             $employee->employeeattendance()->delete();
             $employee->ticketseller()->delete();
             $employee->maintenance()->delete();
             $employee->veterinarian()->delete();
             $employee->animalCarespecialist()->delete();
             
             // Delete the employee record
             $employee->delete();
     
             // Redirect with success message
             return redirect('employees')->with('success', 'Employee Deleted Successfully!!');
         } else {
             // Redirect with error message (employee not found)
             return redirect('employees')->with('error', 'Employee not found!');
         }
     }
     
     
     
    public function destroyattraction($id)
    {
        //
        $attraction = AnimalShow::find($id);
     
         if ($attraction) {
             
             
             $attraction->concession()->delete();
             
             
             $attraction->delete();
        /*  DB::table('AnimalShow')->where('ID', $id)->delete(); */
       /*  $employee->delete(); */
        return redirect('attractions')->with('success', 'Attraction Deleted Successfully!!');
    }else {
        // Redirect with error message (employee not found)
        return redirect('attractions')->with('error', 'Attraction Not Found!!');
    }
}

public function destroyanimal($id)
    {
        //
        $animal = Animal::find($id);
     
         if ($animal) {
             
             
             /* $animal->concession()->delete(); */
             
             // Delete the employee record
             $animal->delete();
        
        return redirect('animals')->with('success', 'animal Deleted Successfully!!');
    }else {
        // Redirect with error message (employee not found)
        return redirect('animals')->with('error', 'animal Not Found!!');
    }
}

public function destroybuilding($id)
    {
        //
        $building = Building::find($id);
     
         if ($building) {
             
             
             $building->enclosure()->delete();
             
             // Delete the enclosure record
             $building->delete();
       
        return redirect('buildings')->with('success', 'building Deleted Successfully!!');
    }else {
        // Redirect with error message (employee not found)
        return redirect('buildings')->with('error', 'building Not Found!!');
    }
}

public function destroywage($id)
{
    // Find the JobType record by ID
    $wage = JobType::find($id);

    if ($wage) {
        $wage->customerServices()->delete();
        $wage->employeeattendance()->delete();
        $wage->ticketseller()->delete();
        $wage->maintenance()->delete();
        $wage->veterinarian()->delete();
        $wage->animalCarespecialist()->delete();
        // Delete associated employees
        $wage->employee()->delete();

        // Delete the JobType record
        $wage->delete();

        return redirect('wages')->with('success', 'Wage Deleted Successfully!');
    } else {
        // Redirect with error message (JobType not found)
        return redirect('wages')->with('error', 'Wage Not Found!');
    }
}

}
