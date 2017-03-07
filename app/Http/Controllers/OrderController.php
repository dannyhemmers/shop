<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;


class OrderController extends Controller
{
    public function addToCart(Request $request)
    {
      $frame = "Frame Nr.".$request->get('frames');
      $arms = "Arm Nr.".$request->get('arms');
      $motors = "Motor Nr.".$request->get('motors');
      $props = "Props Nr.".$request->get('props');
      $stands = "Stands Nr.".$request->get('stands');

      $gumo = Cart::add(1, $frame , 1, 10 );
      Cart::add(2, $arms , 1, 10 );
      Cart::add(3, $motors , 1, 10 );
      Cart::add(4, $props , 1, 10 );
      Cart::add(5, $stands , 1, 10 );

      return redirect('/shoppingcart');

    }

    public function listCart()
    {
      return view('shoppingcart');
    }
}
