<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NEW</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/LogoNEW.png')}}" style="max-width:20px;">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Styles -->
</head>
<body>
  <div class="navcontainer">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="navbar-header ml-0 mt-4">
        <a class="navbar-brand" href="{{route('home')}}"><img class = "Logo" src="{{asset('img/LogoNEW.png')}}" alt="" style = "max-width:175px;max-height:175px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </div>
  <center><div class = "container4">
    <a href="{{route('account.index')}}">Mijn account</a>
     <!-- <a href="#">Bestelstatus</a>  <a href="#">klantenservice</a> -->
  </div>
  <div class = "container5">
  <ul>
  <div class="optionMenu" style="max-width: 50%;">
    <div id="container3"  class = "container3">
      <center><div id="Navcart2" class="row">
        <div class="cartnav3"><p>Winkelwagen</p></div>
        <div class="ordernav2"><p>Bestellen</p></div>
        <div class="confnav"><p>Bevestiging</p></div>
      </div></center>
      <h1 class="cartnav4" style="font-weight:bold;">Bestellen</h1><br>
      <center><div class = "overview">
        <h2>Productoverzicht</h2>
        @inject('cart', 'Gloudemans\Shoppingcart\Cart')
        @if($cart->total() > 0)
          @foreach($data as $product)
            <table class="table">
              <tr>
                <th colspan="2"><h5>{{$product->options->product->title}}</h5></th>
                <td></td>
              </tr>
              <tr>
                <td class = "colleft">Aantal:</td>
                <td class = "colright">{{$product->qty}}</td>
              </tr>
              <tr>
                <td class = "colleft">prijs:</td>
                <td class = "colright">€ {{$product->options->product->price*$product->qty}} ,-</td>
              </tr>
          @endforeach
            @endif
              <tr>
                <td class = "colleft" style="font-weight: bold;">Verzendkosten:</td>
                <td class = "colright" style="font-weight: bold;">Gratis</td>
              </tr>
              <tr>
                <td  class = "colleft" style="font-weight: bold;">Totaal:</td>
                <td  class = "colright" style="font-weight: bold;">€<span id="total">{{$cart->subtotal()}}</span>,-</td>
              </tr>
            </table>
      </div></center><br>
      <form class="mt-4" action="{{route('account.adres.store')}}" method="POST" >
        <h1 style="text-align:center;color:white;">Adresgegevens</h1>
        <h3 style="text-align:center;color:black;">Controleer uw gegevens of vul deze in.</h3>
        @csrf
          <div class="">
              <p class="" style="margin-bottom:4px;">Aanhef*</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input{{ $errors->has('aanhef') ? ' is-invalid' : '' }}" type="radio" name="aanhef" id="man" value="dhr"
                @if(isset($information->aanhef) && ($information->aanhef == 'dhr')) checked @else  @endif required>
                <label class="form-check-label" for="man">dhr.</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input{{ $errors->has('aanhef') ? ' is-invalid' : '' }}" type="radio" name="aanhef" id="mevr" value="mevr"
                @if(isset($information->aanhef) && ($information->aanhef == 'mevr')) checked @else  @endif>
                <label class="form-check-label" for="mevr">mevr.</label>
              </div>
              @if ($errors->has('aanhef'))
                <span class="invalid-feedback">
                  <p><strong>{{ $errors->first('aanhef') }}</strong></p>
                </span>
              @endif
          </div>
          <div class="form-row mt-3">
            <div class="form-group col-md-4">
              <label for="naam">Naam*</label>
              <input type="text" class="form-control{{$errors->has('voor_naam') ? ' is-invalid' : '' }}"  id="naam"  name="voor_naam"
                 value="{{(isset($information->voor_naam)) ? "$information->voor_naam":""}}" required>
                 @if ($errors->has('voor_naam'))
                    <span class="invalid-feedback">
                      <p><strong>{{ $errors->first('voor_naam') }}</strong></p>
                    </span>
                 @endif
            </div>
            <div class="form-group col-md-2">
                <label for="tussenvoegsel">Tussenvoegsel</label>
                <input type="text" class="form-control{{ $errors->has('tussenvoegsel') ? ' is-invalid' : '' }}" id="tussenvoegsel" value="{{(isset($information->tussenvoegsel)) ? "$information->tussenvoegsel":""}}"
                name="tussenvoegsel">
                  @if ($errors->has('tussenvoegsel'))
                      <span class="invalid-feedback">
                      <p><strong>{{ $errors->first('tussenvoegsel') }}</strong></p>
                      </span>
                    @endif
            </div>
            <div class="form-group col-md-4">
                <label for="achternaam">Achternaam*</label>
                <input type="text" class="form-control{{ $errors->has('achter_naam') ? ' is-invalid' : '' }}" id="achternaam" value="{{(isset($information->achter_naam)) ? "$information->achter_naam":""}}"
                name="achter_naam" required>
                @if ($errors->has('achter_naam'))
                      <span class="invalid-feedback">
                      <p><strong>{{ $errors->first('achter_naam') }}</strong></p>
                      </span>
                    @endif
              </div>
            </div>
            <div class="form-group row col-md-4">
               <label for="country">Land*</label>
               <input type="text" class="form-control{{ $errors->has('land') ? ' is-invalid' : '' }}" id="country" value="{{(isset($information->land)) ? "$information->land":""}}"
               name="land" required>
               @if ($errors->has('land'))
               <span class="invalid-feedback">
               <p><strong>{{ $errors->first('land') }}</strong></p>
               </span>
               @endif
            </div>
            <div class="form-row mt-3">
              <div class="form-group col-md-3">
                <label for="postcode">Postcode*</label>
                <input type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" id="postcode" placeholder="" value="{{(isset($information->postcode)) ? "$information->postcode":""}}"
                name="postcode" aria-describedby="postcode-small" required>
                <small id="postcode-small" class="form-text text-muted"></small>
                @if ($errors->has('postcode'))
                  <span class="invalid-feedback">
                    <p><strong>{{ $errors->first('postcode') }}</strong></p>
                  </span>
                @endif
              </div>
              <div class="form-group col-md-3.5">
                <label for="huisnummer">Huisnummer* + toevoeging</label>
                <input type="text" class="form-control{{ $errors->has('huisnummer') ? ' is-invalid' : '' }}" id="huisnummer" placeholder="" value="{{(isset($information->huisnummer)) ? "$information->huisnummer":""}}"
                name="huisnummer" required>
                @if ($errors->has('huisnummer'))
                      <span class="invalid-feedback">
                      <p><strong>{{ $errors->first('huisnummer') }}</strong></p>
                      </span>
                    @endif
              </div>
            </div>
            <div class="form-group row col-md-4">
              <label for="straat">Straatnaam*</label>
              <input type="text" class="form-control{{ $errors->has('straat_naam') ? ' is-invalid' : '' }}" id="straat" placeholder="" value="{{(isset($information->straat_naam)) ? "$information->straat_naam":""}}"
              name="straat_naam" required>
              @if ($errors->has('straat_naam'))
                      <span class="invalid-feedback">
                      <p><strong>{{ $errors->first('straat_naam') }}</strong></p>
                      </span>
                    @endif
            </div>
            <div class="form-group row col-md-4">
              <label for="plaats">Plaatsnaam*</label>
              <input type="text" class="form-control{{ $errors->has('plaats_naam') ? ' is-invalid' : '' }}" id="plaats" placeholder="" value="{{(isset($information->plaats_naam)) ? "$information->plaats_naam":""}}"
              name="plaats_naam" required>
              @if ($errors->has('plaats_naam'))
                      <span class="invalid-feedback">
                      <p><strong>{{ $errors->first('plaats_naam') }}</strong></p>
                      </span>
                    @endif
            </div>
            <div class="form-group row col-md-4">
              <label for="tel">Telefoonnummer*</label>
              <input type="text" class="form-control{{ $errors->has('telefoonnummer') ? ' is-invalid' : '' }}" id="tel" placeholder="" style="" value="{{(isset($information->telefoonnummer)) ? "$information->telefoonnummer":""}}"
              name="telefoonnummer" required>
              @if ($errors->has('telefoonnummer'))
                      <span class="invalid-feedback">
                      <p><strong>{{ $errors->first('telefoonnummer') }}</strong></p>
                      </span>
                    @endif
            </div>
        <center><tr>
          <td><button class="btn2" type="submit"> Wijzig adresgegevens</button></td>
          <td><a class="btn3" href="{{ route('cart.index') }}">terug naar winkelwagentje</a></td>
          @if(isset($information))
            <td>
              <a class="btn3" href="{{ route('prepare.payment') }}" >betalen</a>
            </td>
          @else
          @endif
        </tr></center>
    </form>
  </div>
</div><br>
          <!-- <li class="optionMenu" style="max-width: 50%;"><input type="radio" name="" value="" checked> Ophalen <br> Bij een ophaalpunt bij u in de buurt.</li>
          <li class="optionMenu" style="max-width: 50%;"><input type="radio" name="" value="" checked> Factuuradres is het zelfde als het bezorgadres</li>
          <li class="optionMenu" style="max-width: 50%;">Kies bezorg moment<label class="radio-btn">Vandaag<input type="radio" name="delivery" checked><span class="checkmark"></span></label><label class="radio-btn">Morgen<input type="radio" name="delivery"><span class="checkmark"></span></label><input type="radio" name="delivery" value="">Overmorgen</p></li> -->
          <!-- </div></center>
          <center><div class="container2">
            <a href="#">Algemene voorwaarden </a>
            <a href="#">Privacy</a>
            <a href="#">Coockies</a><br>
            © 2018 - NEW B.V <br>
            Beoordeling van klanten:
            </div></center>
          <!-- <center><div class="item4">
            <a href="#"><img src="{{asset('img/Facebook.png')}}" alt="" style = "max-width:20px;"></a>
            <a href="#"><img src="{{asset('img/Linkedin.png')}}" alt="" style = "max-width:40px;"></a>
            <a href="#"><img src="{{asset('img/Twitter.png')}}" alt="" style = "max-width:30px;"></a>
            <a href="#"><img src="{{asset('img/Youtube.png')}}" alt="" style = "max-width:50px;"></a>
          </div></center> -->
      @if (Session::has('message'))
        <div id="flash" class="bg-light">{{ Session::get('message') }} </div>
      @endif
</body>
</html>

<script>$('#flash').delay(5000).fadeOut();</script>
