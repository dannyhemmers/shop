@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">

      @include('sidebar')


        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

          @foreach($articles as $article)
          <?php $bruttopreis = $article->price*1.19 ?>

          <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="col-item">
              <div class="post-img-content">
                  <img src="/images/{{$article->image}}" class="img-responsive" />

              </div>

              <div class="info">
                <div class="ellipsis">
                  <a href="/article/{{$article->id}}">{{$article->name}}</a>
                </div>
                  <div class="row">

                      <div class="price col-md-6">
                          <h5 class="price-text-color">{{$bruttopreis}}€</h5>
                      </div>
                  </div>
                  <div class="separator clear-left">
                      <p class="btn-add">
                          <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">In den Warenkorb</a></p>
                      <p class="btn-details">
                          <i class="fa fa-list"></i><a href="/article/{{$article->id}}" class="hidden-sm">Details</a></p>
                  </div>
                  <div class="clearfix">
                  </div>
              </div>
          </div>
      </div>
          @endforeach

        </div>
        </div>

    </div>



</div>


@endsection
