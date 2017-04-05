<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class AdminController extends Controller
{
    public function show()
    {

      $orders     = DB::table('orders')
                  ->join('orderdetails', 'orders.id', '=', 'orderdetails.order_id')
                  ->join('orderadresses', 'orders.id', '=', 'orderadresses.order_id')
                  ->select('orders.id as orderid', 'orderadresses.name as fullname', 'orders.email', 'orderdetails.name as articlename', 'orderdetails.price', 'orders.totalprice', 'orderdetails.amount')
                  ->paginate(15);

      return view('admin', ['orders' => $orders]);

    }
}
