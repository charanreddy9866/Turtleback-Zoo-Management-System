<?php

namespace App\Http\Controllers;

use App\Models\AnimalShow;
use App\Models\Concession;
use App\Models\RevenueEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('activity.index');
    }

    public function concessions()
{
    $concessions = DB::table('concession')
        ->select('concession.*', DB::raw('SUM(revenueevents.Revenue) as TotalRevenue'))
        ->leftJoin('revenueevents', 'concession.ID', '=', 'revenueevents.RevenueTypeID')
        ->groupBy('concession.ID', 'concession.Type', 'concession.AnimalShowID', 'concession.created_at','concession.updated_at')
        ->get();

    return view('concessions.index')->with('concessions', $concessions);
}

    public function attendance()
    {
        //
        
        $attendance = DB::select('SELECT * FROM RevenueEvents');
       
        return view('attendance.index')->with('attendance', $attendance);
    }

    public function zooattractions()
    {
        //
        
        $attractions = DB::select('SELECT * FROM AnimalShow');
       
        return view('zooattractions.index')->with('attractions', $attractions);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    public function addattendance()
    {
        //
        return view('attendance.addattendance');
    }

    public function addconcessions()
    {
        //
        return view('concessions.addconcessions');
    }

    public function addattractions()
    {
        //
        return view('zooattractions.addattractions');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeattendance(Request $request)
{
    
    $this->validate($request, [
        
        'Date' => 'required',
        'Revenue' => 'required',
        'TicketsSold' => 'required',
    ]);
    

    // Now insert the employee record
    $employees = new RevenueEvent();
    $employees->Date = $request->input('Date');
    $employees->Revenue = $request->input('Revenue');
    $employees->TicketsSold = $request->input('TicketsSold');
    
    $employees->save();

    return redirect('attendance')->with('success', 'attendance Created Successfully!');
}

public function storeconcession(Request $request)
{
    
    $this->validate($request, [
        
        'Type' => 'required',
        'AnimalShowID' => 'required',
        
    ]);
    

    // Now insert the employee record
    $employees = new Concession();
    $employees->Type = $request->input('Type');
    $employees->AnimalShowID = $request->input('AnimalShowID');
    
    $employees->save();

    return redirect('concessions')->with('success', 'concession Created Successfully!');
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

    return redirect('zooattractions')->with('success', 'Attraction Created Successfully!');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function editattendance($id)
    {
        //
        $attendance = RevenueEvent::find($id);
        
       
        return view('attendance.editattendance')->with('attendance', $attendance);
    }
    public function editattraction($id)
    {
        //
        $attraction = AnimalShow::find($id);
        
       
        return view('zooattractions.editattraction')->with('attraction', $attraction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function updateattendance(Request $request, $id)
{
    
    $this->validate($request, [
        
        'Date' => 'required',
        'Revenue' => 'required',
        'TicketsSold' => 'required',
        
    ]);
    

    // Now insert the employee record
    $employees = RevenueEvent::find($id);
    $employees->Date = $request->input('Date');
    $employees->Revenue = $request->input('Revenue');
    $employees->TicketsSold = $request->input('TicketsSold');
    
    
    $employees->save();

    return redirect('attendance')->with('success', 'attendance Updated Successfully!');
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

    return redirect('zooattractions')->with('success', 'Attraction Updated Successfully!');
}
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyattendance($id)
    {
        //
        $attendance = RevenueEvent::find($id);
     
         if ($attendance) {
             
             
             //$attendance->revenuetypes()->delete();
             
             // Delete the enclosure record
             $attendance->delete();
       
        return redirect('attendance')->with('success', 'attendance Deleted Successfully!!');
    }else {
        // Redirect with error message (employee not found)
        return redirect('attendance')->with('error', 'attendance Not Found!!');
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
        return redirect('zooattractions')->with('success', 'Attraction Deleted Successfully!!');
    }else {
        // Redirect with error message (employee not found)
        return redirect('zooattractions')->with('error', 'Attraction Not Found!!');
    }
}
    public function destroy($id)
    {
        //
    }
}
