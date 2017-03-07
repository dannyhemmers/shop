<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class MainController extends Controller
{
    //

     public function index()
    {
        $drones = DB::table('drones')->limit(3)->get();

        return view('shopmain', ['drones' => $drones]);
    }
}
