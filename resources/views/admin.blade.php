@extends('layouts.app')

@section('content')

<div class="container">
  <table class="table table-hover">
     <thead>
       <tr>
         <th>BestellNummer</th>
         <th>Artikel</th>
         <th>Name</th>
         <th>Menge</th>
         <th>Preis</th>
       </tr>
     </thead>
     <tbody>
       @foreach($orders as $order)
       <tr>
         <td>{{$order->orderid}}</td>
         <td>{{$order->email}}</td>
         <td>{{$order->articlename}}</td>
         <td>{{$order->amount}}</td>
         <td>{{$order->price}}</td>
       </tr>
       <tr>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       @endforeach
     </tbody>
   </table>
</div>

<div class="pages">{{ $orders->links() }}</div>

@endsection
