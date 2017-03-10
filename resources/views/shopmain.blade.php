@extends('layouts.app')

@section('content')


<div class="container">


    <div class="row">

      @include('sidebar')


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
                            <a href="#"><img src="images/shopmain1.jpg" alt="post image"></a>

                          </div>
                          <div class="item">
                            <a href="#"><img src="images/shopmain2.jpg" alt="post image"></a>

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
