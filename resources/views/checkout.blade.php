@extends('layouts.app')

@section('content')
<div class="container">
  @if (Auth::guest())

  <div class="panel panel-default">
    <div class="panel-body">
      Sie sind nicht angemeldet! <br><br>Sie können Bestellungen auch ohne Account tätigen. Eine Registrierung ermöglicht die angenehme Nachhaltung Ihrer Bestellungen. Nach der Registrierung bleibt Ihr Warenkorb erhalten.
      <br><br><a href="{{url('/login')}}"><button class="btn btn-success">Jetzt Einloggen</button></a>
      <a href="{{url('/register')}}"><button class="btn btn-danger">Jetzt Registrieren</button></a>
    </div>
    </div>
    @else



  @endif

      <br>

  <div class="row">
    <div class="col-md-8">
      <form class="form-horizontal" action="submitorder" method="POST">
        {{ csrf_field() }}

        <fieldset>


          <legend>Versand- und Rechnungsadresse</legend>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Name / Firma</label>
            <div class="col-sm-10">
              <input type="text" name="name" id= "name" placeholder="Name / Firma" class="form-control">
            </div>
          </div>

          @if (Auth::guest())
            <div class="form-group">
              <label class="col-sm-2 control-label" for="textinput">E-Mail</label>
              <div class="col-sm-10">
                <input type="text" name="email" id= "email" placeholder="E-Mail Adresse" class="form-control">
              </div>
            </div>
          @else

          @endif

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Zusatz</label>
            <div class="col-sm-10">
              <input type="text" name="additional" id= "additional" placeholder="Adresszusatz" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Stadt</label>
            <div class="col-sm-10">
              <input type="text" name="city" id= "city" placeholder="Stadt" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Straße</label>
            <div class="col-sm-4">
              <input type="text" name="street" id= "street" placeholder="Straße inkl. Hausnummer" class="form-control">
            </div>

            <label class="col-sm-2 control-label" for="textinput">PLZ</label>
            <div class="col-sm-4">
              <input type="text" placeholder="PLZ" name="postal" id= "postal" class="form-control">
            </div>
          </div>



          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Land</label>
            <div class="col-sm-4">
                <select id="country" name="country" class="form-control">
                  <option value="DE">Deutschland</option>
                  <option value="AU">Österreich</option>
                  <option value="CH">Schweiz</option>
                </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary">Bestellung abschicken</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
    </div>

</div>
@endsection
