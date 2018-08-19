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

    <!-- Styles -->
    <style>

/* #r1 span { float:right; position:relative; }
#r1 span input {
    position:absolute;
    top:0px;
    left:0px;
    opacity:0;
}
#r1 span label {
    display:inline-block;
    width:30px;
    height:30px;
    text-align:center;
    color:#FFF;
    background:#ccc;
    font-size:30px;
    margin-right:2px;
    line-height:30px;
    border-radius:50%;
    -webkit-border-radius:50%;
}
#r1 span:hover span label,
#r1 span:hover  label,
#r1 span.checked  label,
#r1 span.checked span label {
    background:#F90;
    color:#FFF;
} */

    </style>

</head>

<body>
  <div class="navcontainer">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="navbar-header ml-0 mt-4">
      <a class="navbar-brand" href="{{route('home')}}"><img class = "Logo" src="{{asset('img/LogoNEW.png')}}" alt="" style = "max-width:175px;max-height:175px;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li>

        <form class="form-inline my-2 my-lg-0" action="{{ route('search.index') }}" method="post">
          @csrf
          <input id= "inputlg" name=search class="form-control ml-4 sm-2" type="search" placeholder="Search" aria-label="Search">
          <button id= "SearchBtn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </li>
        <!-- <li class="nav-item"><select class="select" name="NL">
            <option value="NL">NL</option>
          <option value="EN">EN</option>
        </select> </li> -->
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="navbar-brand" href="#"><img src="{{asset('img/login.png')}}" alt="" style="max-width:50px;max-height:40px;"></a></li>
       @auth
        <li class="nav-item"> 
            <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item nav-link">
            {{ Auth::user()->email }}
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a>
        </li>
        @else
        <li class="nav-item">
          <a id="loginBtn" class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
            <a id= "registerBtn" class="nav-link" href="{{ route('register') }}">Register</a>
        @endauth
        </li>
        <li class="nav-item dropdown" id= "dropdown1">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div id="shopping-items" class="itemcount">@inject('cart', 'Gloudemans\Shoppingcart\Cart'){{$cart->count()}}</div><img src="{{asset('img/Winkelwagentje.png')}}" style="max-width:49px;max-height:49px;"></a>
          <div id= "dropdown-menu4" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              @if ($cart->count() == 0)
              @else
              @foreach($cart->content() as $product)
              <div class="row" id="cart" style="width: 23rem;">
                <div id="headcart" class="col-xs-1 ml-auto w-75">
                  <p>{{str_limit($product->options->product->title, $limit = 30, $end ='...')}}</p>
                </div>
                <div class="col-xs-4">
                  <a id= "knop" href="{{ route('cart.destroy', [$product->rowId]) }}">x</a>
                </div>
                <div class="col-xs-1">
                  <img class="" src="{{$product->options->product->image_large}}"  alt="Product image cap" style="max-width: 100px;">
                </div>
                <div class="col-xs-3 w-50">
                    <p class="beschrijving">{{str_limit($product->options->product->short_description, $limit = 70, $end ='...')}}</p>
                </div>
                <div class="col-xs-4">
                  <p id= "prijs"> prijs €{{$product->options->product->price}},-</p>
                </div>
              </div>
              @endforeach
              @endif
              <a id="winkelwagenBTN2" class="dropdown-item" href="{{ route('cart.index') }}">Naar Winkelwagentje</a>
          </div>
        </li>

      </ul>
    </div>
  </nav>
  <nav class="navbar2 navbar-expand-lg navbar-dark">
    <div class="navbar-header">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ml-auto">
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Categorieën
        </a>
          <ul class="dropdown-menu" id=dropdown-menu1 aria-labelledby="navbarDropdownMenuLink">
            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Computers & tablets</a>
              <ul class="dropdown-menu" id="dropdown-menu5">
                 <li><a class="dropdown-item" href="{{route('laptops.index')}}">Laptop</a></li>
                 <li><a class="dropdown-item" href="{{route('desktops.index')}}">Desktop</a></li>
                 <li><a class="dropdown-item" href="{{route('monitors.index')}}">Monitoren</a></li>
                 <!-- <li><a class="dropdown-item" href="#">Randapparatuur</a></li>
                 <li><a class="dropdown-item" href="#">Tablets</a></li>
                 <li><a class="dropdown-item" href="#">E-readers</a></li>
                 <li><a class="dropdown-item" href="#">Computer onderdelen</a></li>
                 <li><a class="dropdown-item" href="#">Printer</a></li>
                 <li><a class="dropdown-item" href="#">Scanners</a></li>
                 <li><a class="dropdown-item" href="#">Geheugen</a></li>
                 <li><a class="dropdown-item" href="#">Opslag</a></li>
                 <li><a class="dropdown-item" href="#">Netwerk</a></li>
                 <li><a class="dropdown-item" href="#">Internet</a></li>
                 <li><a class="dropdown-item" href="#">Gaming</a></li> -->
              <!-- </ul>
            </li>
            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Beeld & geluid</a>
              <ul class="dropdown-menu" id="dropdown-menu6">
               <li><a class="dropdown-item" href="#">Televisie</a></li>
               <li><a class="dropdown-item" href="#">Beamers</a></li>
               <li><a class="dropdown-item" href="#">Radio's</a></li>
               <li><a class="dropdown-item" href="#">Speakers</a></li>
               <li><a class="dropdown-item" href="#">Tablets</a></li>
               <li><a class="dropdown-item" href="#">E-readers</a></li>
               <li><a class="dropdown-item" href="#">Televisie accessoires</a></li>
               <li><a class="dropdown-item" href="#">Studio onderdelen</a></li>
               <li><a class="dropdown-item" href="#">Home cinema</a></li>
               <li><a class="dropdown-item" href="#">DJ accessoires</a></li>
               <li><a class="dropdown-item" href="#">Audio voor onderweg</a></li>
               <li><a class="dropdown-item" href="#">Muziekinstrumenten</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Telefonie & navigatie</a>
              <ul class="dropdown-menu" id="dropdown-menu7">
               <li><a class="dropdown-item" href="#">Mobiele telefonie</a></li>
               <li><a class="dropdown-item" href="#">Navigatie</a></li>
               <li><a class="dropdown-item" href="#">Vaste telefoons</a></li>
               <li><a class="dropdown-item" href="#">Walkie talkies</a></li>
               <li><a class="dropdown-item" href="#">Opladers</a></li>
               <li><a class="dropdown-item" href="#">Telefoon accessoires</a></li>
               <li><a class="dropdown-item" href="#">Telefoonhoesjes</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Huishouden & wonen</a>
              <ul class="dropdown-menu" id="dropdown-menu8">
               <li><a class="dropdown-item" href="#">Wassen</a></li>
               <li><a class="dropdown-item" href="#">Drogen</a></li>
               <li><a class="dropdown-item" href="#">Klimaatbeheersing</a></li>
               <li><a class="dropdown-item" href="#">Televisie</a></li>
               <li><a class="dropdown-item" href="#">Beamers</a></li>
               <li><a class="dropdown-item" href="#">Stofzuigers</a></li>
               <li><a class="dropdown-item" href="#">Inbraakpreventie</a></li>
               <li><a class="dropdown-item" href="#">Strijkijzers</a></li>
               <li><a class="dropdown-item" href="#">Baby</a></li>
               <li><a class="dropdown-item" href="#">Kind</a></li>
               <li><a class="dropdown-item" href="#">Woon accessoires</a></li>
               <li><a class="dropdown-item" href="#">Meer...</a></li>
              </ul>
            </li> -->
            <!-- <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Keuken</a>
              <ul class="dropdown-menu" id="dropdown-menu9">
               <li><a class="dropdown-item" href="#">Grote keukenapparatuur</a></li>
               <li><a class="dropdown-item" href="#">Kleine keukenapparatuur</a></li>
               <li><a class="dropdown-item" href="#">Koffie</a></li>
               <li><a class="dropdown-item" href="#">Opbergen</a></li>
               <li><a class="dropdown-item" href="#">Bewaren</a></li>
               <li><a class="dropdown-item" href="#">Keuken</a></li>
               <li><a class="dropdown-item" href="#">Bakgerei</a></li>
               <li><a class="dropdown-item" href="#">Pannen</a></li>
               <li><a class="dropdown-item" href="#">Kokers</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Sport & verzorging</a>
              <ul class="dropdown-menu"id="dropdown-menu10">
               <li><a class="dropdown-item" href="#">Sportelektronica</a></li>
               <li><a class="dropdown-item" href="#">Gezondheid</a></li>
               <li><a class="dropdown-item" href="#">Fitness</a></li>
               <li><a class="dropdown-item" href="#">Krachttraining</a></li>
               <li><a class="dropdown-item" href="#">Scheren</a></li>
               <li><a class="dropdown-item" href="#">Ontharen</a></li>
               <li><a class="dropdown-item" href="#">Mondverzorging</a></li>
               <li><a class="dropdown-item" href="#">Haarstyling</a></li>
               <li><a class="dropdown-item" href="#">Lichaamsmassage</a></li>
               <li><a class="dropdown-item" href="#">Verzorging</a></li>
              </ul>
            </li> -->
            <!-- <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Reizen & fashion</a>
              <ul class="dropdown-menu" id="dropdown-menu11">
               <li><a class="dropdown-item" href="#">Bagage</a></li>
               <li><a class="dropdown-item" href="#">Kamperen</a></li>
               <li><a class="dropdown-item" href="#">Tassen</a></li>
               <li><a class="dropdown-item" href="#">Outdoor</a></li>
               <li><a class="dropdown-item" href="#">Horloges</a></li>
               <li><a class="dropdown-item" href="#">Sieraden</a></li>
               <li><a class="dropdown-item" href="#">Motor</a></li>
               <li><a class="dropdown-item" href="#">Fietsen</a></li>
               <li><a class="dropdown-item" href="#">Auto accessoires</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Foto & video</a>
              <ul class="dropdown-menu" id="dropdown-menu12">
               <li><a class="dropdown-item" href="#">Fotografie</a></li>
               <li><a class="dropdown-item" href="#">Satieven</a></li>
               <li><a class="dropdown-item" href="#">Statieven accessoires</a></li>
               <li><a class="dropdown-item" href="#">Video camera's</a></li>
               <li><a class="dropdown-item" href="#">Action camera's</a></li>
               <li><a class="dropdown-item" href="#">Radio's</a></li>
               <li><a class="dropdown-item" href="#">Speakers</a></li>
               <li><a class="dropdown-item" href="#">Studio</a></li>
               <li><a class="dropdown-item" href="#">Geluidbewerking</a></li>
               <li><a class="dropdown-item" href="#">Camera accessoires</a></li>
               <li><a class="dropdown-item" href="#">Lenzen</a></li>
               <li><a class="dropdown-item" href="#">Filters</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Tuin & klussen</a> -->
              <!-- <ul class="dropdown-menu" id="dropdown-menu13">
               <li><a class="dropdown-item" href="#">Tuinonderhoud</a></li>
               <li><a class="dropdown-item" href="#">Buitenspeelgoed</a></li>
               <li><a class="dropdown-item" href="#">Tuininrichting</a></li>
               <li><a class="dropdown-item" href="#">Buiten koken</a></li>
               <li><a class="dropdown-item" href="#">Elektrische gereedschap</a></li>
               <li><a class="dropdown-item" href="#">Luchtgereedschap</a></li>
               <li><a class="dropdown-item" href="#">Klusbenodigdheden</a></li>
               <li><a class="dropdown-item" href="#">Meer...</a></li>
              </ul>
            </li>
          </ul> -->
        <!-- </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown7" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
            Cadeaus & inspiratie
          </a>

          <div class="dropdown-menu" id=dropdown-menu2 aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><strong>Cadeautips</strong></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Cadeaubonnen</a>
            <a class="dropdown-item" href="#">Luxe cadeaus</a>
            <a class="dropdown-item" href="#">Tips van onze experts</a>
            <a class="dropdown-item" href="#">Persoonlijke tips</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><strong>Alle cadeautips</strong></a>
          </div>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Aanbiedingen
          </a>
          <div class="dropdown-menu" id="dropdown-menu3" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><strong>Altijd voordeel</strong></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Top deals!</a>
            <a class="dropdown-item" href="#">Retour deals!</a>
            <a class="dropdown-item" href="#">Entertainment deals!</a>
          </div></li>
        <li class="nav-item" >
          <a class="nav-link" id="navbaritem" href="#">Zakelijk</a>
        </li>
        <li class="nav-item" id="navbarDropdown4">
          <a class="nav-link" id="navbaritem2" href="#">Cadeaubon</a>
        </li>
        <li class="nav-item" id="navbarDropdown5">
          <a class="nav-link" id="navbaritem3" href="#">Bestelstatus</a>
        </li>
        <li class="nav-item" id="navbarDropdown6">
          <a class="nav-link" id="navbaritem4" href="#">Klantenservice</a>
        </li> -->
      </ul>
    </div>
  </nav>
</div>

<center><div class=""><img src="{{asset('img/plaatje.png')}}" alt="" style="max-width:500px;"><br>
<h4 style="color:#018179;">Voor <strong style="color:#f39200;">23:59</strong> besteld, morgen <strong style="color:#f39200;">GRATIS</strong> in huis.</h4> </div></center>





    <div id="app" v-cloak>

        <main  class="py-4">

          <div id="app">
            @yield('content')
          </div>


        @if (Session::has('message'))
        <div id="flash" class="alert alert-info" v-show="flashSession">{{ Session::get('message') }} </div>
        @endif
        <div id="flash-vue"  v-bind:class="status"  v-show="flashVue" v-text="tekst"></div>
        <div class="loader" v-if="window.load"></div>

        </main>

    </div>
    <center><footer>
        <!-- <div class="gridcontainer">
         <div class="item1"><strong>Klantenservice</strong></div>
         <div class="item2"><strong>Zakelijk</strong></div>
         <div class="item3"><strong>Over NEW</strong></div>
         <div class="item1"><a href="#">Bestelling</a></div>
         <div class="item2"><a href="#">Zakelijke klanten</a></div>
         <div class="item3"><a href="#">Ons assortiment</a></div>
         <div class="item1"><a href="#">Betaling</a></div>
         <div class="item2"><a href="#">Affiliate programma</a> </div>
         <div class="item3"><a href="#">Blog</a></div>
         <div class="item1"><a href="#">Verzending en bezorging</a></div>
         <div class="item2"><a href="#">Waardebonnen</a></div>
         <div class="item3"><a href="#">Nieuws</a></div>
         <div class="item1"><a href="#">Retouneren & service</a></div>
         <div class="item3"><a href="#">Cadeaubonnen</a></div>
         <div class="item1"><a href="#">Telefoon reperatie</a></div>
         <div class="item3"><a href="#">Werken bij NEW</a></div>
         <div class="item1"><a href="#">Privacy</a></div>
         <div class="item3"><a href="#">Deployment jobs</a> </div>
         <div class="item1"><a href="#">Inloggen</a></div>
         <div class="item3"><a href="#">De NEW iphone app</a></div>
      </div> -->
      <!-- <div class="container2">
        <a href="#">Algemene voorwaarden </a>
        <a href="#">Privacy</a>
        <a href="#">Coockies</a><br>
        © 2018 - NEW B.V <br>
        Beoordeling van klanten:
        <div class="item4">
        <a href="#"><img src="{{asset('img/Facebook.png')}}" alt="" style = "max-width:20px;"></a>
        <a href="#"><img src="{{asset('img/Linkedin.png')}}" alt="" style = "max-width:40px;"></a>
        <a href="#"><img src="{{asset('img/Twitter.png')}}" alt="" style = "max-width:30px;"></a>
        <a href="#"><img src="{{asset('img/Youtube.png')}}" alt="" style = "max-width:50px;"></a>
        </div> -->
      </div>
    </footer></center>

</body>



</html>




<script>
window.events= new Vue();
window.flash = function(message){
window.events.$emit('flash', message);
};
window.load=false;
window.auth=@if(Auth::check()) {{Auth::user()->id}} @else false @endif;
src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ;
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous";
src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous";
</script>




<script type="text/javascript">
$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});



</script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>



<script>
 // Check Radio-box
 //$(".rating input:radio").attr("checked", false);



// $(".rating input").click(function () {
//     $(".rating span").removeClass('checked');
//     $(this).parent().addClass('checked');
// });



// $('#r1 input').click(function(){
//   $("#r1 span").removeClass('checked');
//     $(this).parent().addClass('checked');
// });

// $('input[name=ge]:radio').on('click', function(){
//   $("input[name=ge]:radio").parents("span").removeClass('checked');
//     $(this).parent().addClass('checked');
// });



</script>
