@extends('layouts.app')

@section('content')


<div class="container">
<?php $bruttopreis = $article->price*1.19 ?>


    <div class="row">
      @include('sidebar')

        <div class="col-sm-6">
          <p>{{$article->name}}</p>
          <img src="/images/{{$article->image}}" class="img-responsive" alt="Bild">
        </div>

        <div class="col-sm-4">
          <p>{!!$article->description_long!!}</p>
          <p><h3>Nettopreis: {{$article->price}}€</h3></p>
          <p><h1>Preis inkl. MwSt.: {{$bruttopreis}}€</h1></p>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="/addToCart">
          {{ csrf_field() }}
          	<input type="hidden" name="id" value="{{$article->id}}"></input>
            <input type="hidden" name="name" value="{{$article->name}}"></input>
            <input type="hidden" name="amount" value="1"></input>
            <input type="hidden" name="price" value="{{$article->price}}"></input>


    <div class="form-group">
        <div class="">
            <button type="submit" class="btn btn-primary">
                In den Warenkorb
            </button>

        </div>
    </div>
  </form>


    </div>





</div>


@endsection
