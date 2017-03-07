<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    public function show($name)
    {
      $category = DB::table('categories')
                  ->where('name', '=', $name)
                  ->first();

      if($category == true)
      {
        $articles = DB::table('articles')
                    ->where('category', '=', $category->id)
                    ->get();


        return view('category', compact('category', 'articles'));
      }

      return "Hier ist wohl was schiefgelaufen";
    }
}
