<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use Cart;
use Auth;
use DB;

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

    public function addToCartAJAX(Request $request)
    {

      $buildservice = $request->get('buildservice');
      $timestamp = $request->get('timestamp');

      $frameid = $request->get('frameid');
      $framename = $request->get('framename');
      $frameamount = $request->get('frameamount');
      $frameprice = $request->get('frameprice');
      Cart::add($frameid, $framename, $frameamount, $frameprice);

      $powerid = $request->get('powerid');
      $powername = $request->get('powername');
      $poweramount = $request->get('poweramount');
      $powerprice = $request->get('powerprice');
      Cart::add($powerid, $powername, $poweramount, $powerprice);

      $motorid = $request->get('motorid');
      $motorname = $request->get('motorname');
      $motoramount = $request->get('motoramount');
      $motorprice = $request->get('motorprice');
      Cart::add($motorid, $motorname, $motoramount, $motorprice);

      $propid = $request->get('propid');
      $propname = $request->get('propname');
      $propamount = $request->get('propamount');
      $propprice = $request->get('propprice');
      Cart::add($propid, $propname, $propamount, $propprice);

      $receiverid = $request->get('receiverid');
      $receivername = $request->get('receivername');
      $receiveramount = $request->get('receiveramount');
      $receiverprice = $request->get('receiverprice');
      Cart::add($receiverid, $receivername, $receiveramount, $receiverprice);

      $controllerid = $request->get('controllerid');
      $controllername = $request->get('controllername');
      $controlleramount = $request->get('controlleramount');
      $controllerprice = $request->get('controllerprice');
      Cart::add($controllerid, $controllername, $controlleramount, $controllerprice);

      if ($buildservice == 'Ja')
      {
        $servicename = 'Zusammenbauen von ' . $timestamp;
        Cart::add(19, $servicename, 1, 130);
      }

      //Rückgabe
      return response()->json([
                    'ok' => 'ok'
                  ]);

    }

    public function listCart()
    {
      return view('shoppingcart');
    }

    public function order(Request $request)
    {

      $name = $request->get('name');
      $additional = $request->get('additional');
      $city = $request->get('city');
      $street = $request->get('street');
      $postal = $request->get('postal');
      $country = $request->get('country');

      if(Cart::total() == 0)
      {
        return "Keine Artikel im Warenkorb vorhanden";
      }
      else
      {

        if(Auth::guest())
        {
            $email = $request->get('email');

            $orderid = DB::table('orders')->insertGetId(
                ['user_id' => 3, 'email' => $email, 'totalprice' => Cart::total(2, '.', ''), 'created_at' => Carbon::now('Europe/Berlin')]
            );
        }
        else
        {
            $orderid = DB::table('orders')->insertGetId(
                ['user_id' => Auth::id(), 'totalprice' => Cart::total(2, '.', ''), 'email' => Auth::user()->email, 'created_at' => Carbon::now('Europe/Berlin')]
            );
        }


        foreach(Cart::content() as $row)
        {
            DB::table('orderdetails')->insert(
                ['order_id' => $orderid, 'article_id' => $row->id, 'name' => $row->name, 'amount' => $row->qty, 'price' => $row->price, 'created_at' => Carbon::now('Europe/Berlin')]
            );

        }

        DB::table('orderadresses')->insert(
            ['order_id' => $orderid, 'country' => $country, 'name' => $name, 'street' => $street, 'additional' => $additional, 'postal' => $postal, 'city' => $city]
        );
      }

      Cart::destroy();
      return view('successful');

    }

}
