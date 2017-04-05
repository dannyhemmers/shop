@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

      <h1>Warenkorb</h1>

    </div>

    <div class="row">

      <div class="well well-sm">
      @if(Cart::total() == 0)
        <p>Warenkorb ist leer</p>
      @else
        @foreach(Cart::content() as $row)
          <p>
            Artikel: {{$row->name}}
            <br>
            Preis: {{$row->price}}€
            <br>
            Anzahl: {{$row->qty}}
          </p>
        @endforeach

        <p>
          <kbd>Nettopreis: {{Cart::total(2, '.', '') - Cart::tax(2, '.', '')}}€</kbd>
          <br />
          <kbd>+ 19% MwSt.: {{Cart::tax(2, '.', '')}}€</kbd>
          <br />
          <kbd>Endpreis: {{Cart::total(2, '.', '')}}€</kbd>
        </p>
      @endif
    </div>

    </div>

    <div class="row">
      <form style="display: inline;" action="destroycart" method="POST">
        {{ csrf_field() }}
      <button class="btn btn-danger" type="submit">Warenkorb löschen</button>
    </form>



        <a href="{{url('/checkout')}}"><button class="btn btn-primary" type="submit">Zur Kasse</button></a>

    </div>


</div>
@endsection
