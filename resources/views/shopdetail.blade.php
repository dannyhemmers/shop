@extends('layouts.app')

@section('content')
<div class="container">



    <div class="row">
      @include('sidebar')

        <div class="col-sm-6">
          <p>{{$article->name}}</p>
          <img src="/images/{{$article->image}}" class="img-responsive" alt="Bild">
        </div>

        <div class="col-sm-4">
          <p>{!!$article->description_long!!}</p>
          <p><h1><kbd>{{$article->price}}€</kbd></h1></p>
        </div>
        <button type="button" class="btn btn-primary btn-lg"><i class="fa fa-shopping-cart" aria-hidden="true"></i> In den Warenkorb</button>


    </div>





</div>


@endsection
