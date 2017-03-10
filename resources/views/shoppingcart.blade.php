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
          <kbd>Nettopreis: {{Cart::total() - Cart::tax()}}€</kbd>
          <br />
          <kbd>+ 19% MwSt.: {{Cart::tax()}}€</kbd>
          <br />
          <kbd>Endpreis: {{Cart::total()}}€</kbd>
        </p>
      @endif
    </div>

    </div>

    <div class="row">
      <form action="destroycart" method="POST">
        {{ csrf_field() }}
      <button type="submit">Warenkorb löschen</button>
    </form>
    </div>


</div>
@endsection
