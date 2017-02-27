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
        $articles = DB::table('articles')->limit(3)->get();

        return view('shopmain', ['articles' => $articles]);
    }
}
