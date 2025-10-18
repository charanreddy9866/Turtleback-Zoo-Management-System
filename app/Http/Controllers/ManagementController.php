<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Implement logic to fetch revenue details for the given day
        $revenueDetails = DB::table('revenueevents')
            /* ->where('Date', $date) */
            ->get();
        $totalRevenue = DB::table('revenueevents')->sum('Revenue');

        

        // Implement logic to fetch animal population details
        $populationDetails = DB::table('animal')
            ->join('species', 'animal.SpeciesID', '=', 'species.ID')
            ->select('species.Name as Species', 'animal.Status', DB::raw('SUM(animal.FoodCost) as MonthlyFoodCost'))
            ->groupBy('species.Name', 'animal.Status')
            ->get();

            $employeesCost =DB::select('SELECT * FROM JobType');
            
        
        // Implement logic to fetch top attractions
        $topAttractions = DB::table('animalshow')
            ->join('revenueevents', 'animalshow.ID', '=', 'revenueevents.RevenueTypeID')
            ->select('animalshow.Name', DB::raw('SUM(revenueevents.Revenue) as TotalRevenue'))
            ->groupBy('animalshow.Name')
            ->orderByDesc('TotalRevenue')
            ->take(3)
            ->get();

        // Implement logic to fetch the best days
        $bestDays = DB::table('RevenueEvents')
        ->select('Date', DB::raw('SUM(Revenue) as TotalRevenue'))
        ->whereBetween('Date', [now()->startOfMonth()->toDateString(), now()->endOfMonth()->toDateString()])
        ->groupBy('Date')
        ->orderByDesc('TotalRevenue')
        ->limit(5)
        ->get();
        
         // Implement logic to fetch average revenue details
         $averageRevenues = DB::table('revenueevents')
         ->select('RevenueTypeID', DB::raw('AVG(Revenue) as AverageRevenue'))
         ->groupBy('RevenueTypeID')
         ->get();

         $attendanceAverage = DB::table('revenueevents')->avg('Revenue');

         $averageAttractionCost = DB::table('animalshow')
    ->select(DB::raw('AVG((AdultPrice + SeniorPrice + SeniorPrice + ChildPrice) * PerDay) as AverageAttractionCost'))
    ->first();

        $attractionAverage = $averageAttractionCost->AverageAttractionCost;


                $averageConcession = DB::table('animal')
            ->join('species', 'animal.SpeciesID', '=', 'species.ID')
            ->select(DB::raw('AVG(animal.FoodCost) as AverageConcession'))
            ->first();

        $averageConcessionCost = $averageConcession->AverageConcession;


        return view('management.index')
        ->with('revenueDetails',$revenueDetails)
        ->with('totalRevenue',$totalRevenue)
        ->with('populationDetails',$populationDetails)
        ->with('employeesCost',$employeesCost)
        ->with('topAttractions',$topAttractions)
        ->with('bestDays',$bestDays)
        ->with('averageRevenues',$averageRevenues)
        ->with('attractionAverage',$attractionAverage)
        ->with('attendanceAverage',$attendanceAverage)
        ->with('averageConcessionCost',$averageConcessionCost)
        ->with('averageRevenues',$averageRevenues)
        /* 
        
       
        ->with('month',$month)
        ->with('date',$date)
         */;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function destroy($id)
    {
        //
    }
}
