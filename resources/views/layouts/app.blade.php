<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ConfiDro</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <script src="/js/jquery-3.1.1.min.js"></script>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

<script src="https://use.fontawesome.com/90197b0432.js"></script>

</head>
<body>
    <div id="app">

  <nav class="navbar navbar-inverse" role="navigation">
  	<div class="container">
  	  <!-- Brand and toggle get grouped for better mobile display -->
  	  <div class="navbar-header">
  		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
  		  <span class="sr-only">Toggle navigation</span>
  		  <span class="icon-bar"></span>
  		  <span class="icon-bar"></span>
  		  <span class="icon-bar"></span>
  		</button>
  		<a class="navbar-brand" href="{{url('/')}}">CONFIDRO</a>
  	  </div>

  	  <!-- Collect the nav links, forms, and other content for toggling -->
  	  <div class="collapse navbar-collapse navbar-ex1-collapse">
  		<ul class="nav navbar-nav">
          <li><a href="{{ url('/configure') }}">Drohne Konfigurieren</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produkte<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Fertige Drohnen</a></li>
              <li class="divider"></li>

              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Einzelteile</a>
                <ul class="dropdown-menu">
                <li><a href="#">Rahmen</a></li>
                <li><a href="#">Arme</a></li>
                <li><a href="#">Motoren</a></li>
                <li><a href="#">Props</a></li>
                <li><a href="#">Ständer</a></li>
                </ul>
                </li>
            </ul>
          </li>
  		</ul>
  		 <ul class="nav navbar-nav navbar-right">
         <li><a href="/shoppingcart">Warenkorb <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

         @if (Auth::guest())
           <a class="btn btn-success btn-sm navbar-btn" style="margin-left:10px;" href="{{url('/login')}}">Einloggen</a>
           <a class="btn btn-danger btn-sm navbar-btn"  href="{{url('/register')}}">Registrieren</a>
         @else
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>


            </ul>
        </li>
         @endif


      </ul>
  		</div><!-- /.navbar-collapse -->
  	</div>
  </nav>


          @yield('content')

        </div>
    </div>



    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script>  $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>
