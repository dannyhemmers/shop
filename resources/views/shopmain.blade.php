@extends('layouts.app')

@section('content')


<div class="container-fluid">

    <div class="row">

        <div style="margin-left: 10px; margin-bottom:30px;">


        <h4>Herzlich Willkommen,
            @if (Auth::guest())
                lieber Gast
            @else
            {{ Auth::user()->name }}
            @endif
        </h4>
        </div>

    </div>

    <div class="row row-centered">

      <div class="col-sm-5">

        <div class="panel panel-default">
            <div class="panel-heading">Unsere beliebtesten Drohnen</div>
            <div class="panel-body">

                @foreach ($articles as $article)

                    <div class="col-sm-6 mainarticle">

                        <a href="/drohne/{{ $article->id }}">
                          <div class="img-wrapper">
                            <img src="{{$article->image_url}}" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                          </div>
                        <p>{{$article->name}}</p>
                        <p>{{$article->description}}</p>
                        <p>{{$article->price}}€</p></a>

                    </div>

              @endforeach

            </div>
        </div>
        </div>



        <div class="col-sm-3">
          <div class="panel panel-default">

            <div class="panel-heading">
              Kategorien
            </div>

            <div class="panel-body">
              <ul class="list-group">
                <a href="" class="list-group-item">Fertige Drohnen</a>
                <a href="" class="list-group-item">Rahmen</a>
                <a href="" class="list-group-item">Arme</a>
                <a href="" class="list-group-item">Motoren</a>
                <a href="" class="list-group-item">Props</a>
                <a href="" class="list-group-item">Ständer</a>

              </ul>
            </div>

          </div>
        </div>

    </div>

    <div class="row row-centered">

      <div class="col-sm-3 col-centered">
        <div class="panel panel-default">
        <div class="panel-heading">
            Konfigurator
        </div>
        <div class="panel-body centerinpanel">
            <h5>Oder einfach deine eigene Drohne selbst zusammenstellen</h5>
            <a href="{{url('/configure')}}"><button class="btn btn-primary btn-lg ">Zum Konfigurator</button></a>
        </div>
      </div>

      </div>

    </div>

</div>


@endsection
