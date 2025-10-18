<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    //
    public function index(){
        $title='Welcome To Maxtech Agencies';
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        $title='About Page';
        return view('pages.about')->with('title', $title);
    }
    public function services(){
        $title='Services Page';
        return view('pages.services')->with('title', $title);
    }
    public function contact(){
        $title='Contact Page';
        return view('pages.contact')->with('title', $title);
    }
    public function profile(){
        $title='Profile Page';
        return view('pages.profile')->with('title', $title);
    }
    public function courtside(){
        $title='CourtSide Restaurant';

        $products=Products::all();
        $products=DB::select('SELECT * FROM products where access="courtside"');
       
        return view('pages.courtside')->with('products', $products);
    }
    public function riverside(){
        $title='RiverSide Restaurant';
        $products=Products::all();
        $products=DB::select('SELECT * FROM products where access="riverside"');
       
        return view('pages.riverside')->with('products', $products);
    }
    public function beachside(){
        $title='BeachSide Restaurant';
        $products=Products::all();
        $products=DB::select('SELECT * FROM products where access="beachside"');
       
        return view('pages.beachside')->with('products', $products);
}
public function success(){
   
    return view('pages.success')->with('success', 'Registration Successful!!');
}
}