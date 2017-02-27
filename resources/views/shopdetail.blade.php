@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">


    <div class="row text-center">

        <div class="col-sm-6">
          <p>{{$article->name}}</p>
          <img src="{{$article->image_url}}" class="img-rounded" alt="Cinque Terre" width="304" height="236">
        </div>

        <div class="col-sm-4">
          <p>{{$article->description_long}}</p>
          <p><h1><kbd>{{$article->price}}€</kbd></h1></p>
        </div>


    </div>

<div class="row text-center">

  <div class="col-sm-6 text-center">
  <button type="button" class="btn btn-primary btn-lg">Standardvariante</button>
  <a href="/configure"><button type="button" class="btn btn-primary btn-lg ">Personalisieren</button></a>

  </div>

</div>


</div>
@endsection
