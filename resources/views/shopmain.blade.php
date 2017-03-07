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
      				  <li><a href="/category/props">Propeller</a></li>
                <li><a href="/category/controllers">Controller</a></li>
                <li><a href="/category/power">Stromversorgung</a></li>
                <li><a href="/category/other">Andere</a></li>
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

          <div class="row">
            <div class="col-sm-12 col-lg-12">

              <div class="panel panel-default">

                <div class="panel-heading">
                    <h4>JETZT KONFIGURIEREN</h4>
                </div>
                <div class="panel-body">
                    <a href="/configure"><h4>Erstelle jetzt in unserem neuen 3D-Konfigurator deine eigene Drohne!</h4></a>
                </div>

              </div>

            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-12">

            <h4>Oder sieh dir eine unserer fertigen Drohnen an:</h4>
          </div>
          </div>

        		<!-- SLIDER -->
        		<div class="row">
        			<div class="col-sm-12 col-lg-12">
        			<div id="myCarousel" class="carousel slide">
                        <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="item active">
                            <a href="#"><img src="images/zmr250.jpg" alt="post image"></a>
                            <div class="carousel-caption">
                              <h4>Race Drohne ZMR 250</h4>
                            </div>
                          </div>
                          <div class="item">
                            <a href="#"><img src="images/FrameTarotIronMan650.png" alt="post image"></a>
                            <div class="carousel-caption">
                              <h4>Tarot Drohne</h4>
                            </div>
                          </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="icon-prev"></span></a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="icon-next"></span></a>
              </div>
        			</div>
        		</div>
        </div>
        </div>

    </div>



</div>


@endsection
