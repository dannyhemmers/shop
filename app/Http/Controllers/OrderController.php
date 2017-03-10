<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;


class OrderController extends Controller
{
    public function addToCart(Request $request)
    {
      $id = $request->get('id');
      $name = $request->get('name');
      $amount = $request->get('amount');
      $price = $request->get('price');

      Cart::add($id, $name, $amount, $price);

      return redirect('/shoppingcart');

    }

    public function listCart()
    {
      return view('shoppingcart');
    }
}
