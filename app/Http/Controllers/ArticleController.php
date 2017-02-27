<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = DB::table('articles')->where('id', $id)->first();

        return view('shopdetail', ['article' => $article]);
    }

    public function configure()
    {
      return view('configurator');
    }
}
