@extends('layouts.app')

@section('content')


<div class="container">


    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
      		<div class="panel panel-default">
      			<div class="panel-heading">
      				<h4>Produkte</h4>
      			</div>
      			<div class="panel-body">
      				<ul id="cat-navi" class="nav nav-list">
                <li><a href="/category/complete">Fertige Drohnen</a></li>
      				  <li><a href="/category/frames">Rahmen</a></li>
      				  <li><a href="/category/arms">Arme</a></li>
      				  <li><a href="/category/motors">Motoren</a></li>
      				  <li><a href="/category/props">Props</a></li>
      			</div>
      		</div>

      		<div class="panel panel-default visible-lg">
      			<div class="panel-heading">
      				<h4>Most Popular</h4>
      			</div>
      				<div class="panel-body">
      					<ul id="cat-navi2" class="nav nav-list ">
      					  <li class="active"><a href="#">Active category</a></li>
      					  <li><a href="#">Category title</a></li>
      					  <li><a href="#">Category title</a></li>
      					  <li><a href="#">Category title</a></li>
      					  <li><a href="#">Category title</a></li>
      					  <li><a href="#">Category title</a></li>
      					  <li><a href="#">Category title</a></li>
      					  <li><a href="#">Category title</a></li>
      					  <li><a href="#">Category title</a></li>
      					  <li><a href="#">Category title</a></li>
      					  <li><a href="#">Category title</a></li>
      					</ul>
      				</div>
      		</div>

      	</div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

          @foreach($articles as $article)
          <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="col-item">
              <div class="post-img-content">
                  <img src="/images/{{$article->image}}" class="img-responsive" />
                  <span class="post-title">
                        {{$article->name}}
                  </span>
              </div>
              <div class="info">
                  <div class="row">
                      <div class="price col-md-6">
                          <h5 class="price-text-color">{{$article->price}}€</h5>
                      </div>
                  </div>
                  <div class="separator clear-left">
                      <p class="btn-add">
                          <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">Zum Warenkorb hinzufügen</a></p>
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
