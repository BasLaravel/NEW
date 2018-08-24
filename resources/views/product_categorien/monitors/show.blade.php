

@extends('master')

@section('content')


<div class="container">
  <h3 class="card-title">{{$monitor->title}}</h3>
  <!-- <a class="link" href="#">
    <p class="ratingstar2">&#9733;</p>
    <p class="ratingstar2">&#9733;</p>
    <p class="ratingstar2">&#9733;</p>
    <p class="ratingstar2">&#9733;</p>
    <p class="ratingstar">&#9733;</p>
  Reviews</a> -->
  <!-- <a class="link" href="#">Bekijk alle accessoires</a> -->
  <div class="row mt-5">
      <div class="col-sm">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" ><img class="d-block w-100" src="{{asset($monitor->image_1)}}" style="max-height:60px;"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"><img class="d-block w-100" src="{{asset($monitor->image_2)}}" style="max-height:60px;"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"><img class="d-block w-100" src="{{asset($monitor->image_3)}}" style="max-height:60px;"></li>
          </ol>
          <div class="carousel-inner ">
            <div class="carousel-item active">
              <a href=""><img class="d-block w-100" src="{{$monitor->image_1}}" alt="First slide" style="max-height:270px;"></a>
            </div>
            <div class="carousel-item">
              <a href=""><img class="d-block w-100" src="{{$monitor->image_2}}" alt="Second slide" style="max-height:270px;"></a>
            </div>
            <div class="carousel-item">
              <a href=""><img class="d-block w-100" src="{{$monitor->image_3}}" alt="Third slide" style="max-height:270px;"></a>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div id="colom2" class="col-sm">
        <ul>
          <!-- <li>Varianten: <select id="selectvar" class="select" name="NL">
            <option value="NL">{{$monitor->summary}}</option>
          </select></li><br> -->
          <!-- <li><div class="price"> -->

          <!-- </div></li><br> -->
          <li><h2>€ {{$monitor->price}},-</h2></li>
          <li><a href="{{route('addToCart', [$monitor->ean])}}" id="winkelwagenBTN" class="btn btn-primary shoppingcart">In winkelwagen <img src="{{asset('img/Winkelwagentje.png')}}" alt="" style="max-width:50px;"></a></li><br>
          <li>&#10004;<a href="#">Voor 23.59 uur besteld, morgen gratis bezorgd</a></li>
          <li>&#10004;<a href="#">Morgen gratis ophalen bij 3.000+ ophaalpunten</a></li>
          <li>&#10004;<a href="#">Gratis binnen 30 dagen te retourneren</a></li>
          <!-- <li><div class="custom-control custom-checkbox"> -->
          <!-- <input type="checkbox" class="custom-control-input" id="customCheck1"> -->
          <!-- <label class="custom-control-label" for="customCheck1">Vergelijk dit produkt.</label> -->
          <!-- </div></li> -->
       </ul>
      </div>
  </div><br><br><br><br><br><br>

<div class="container">
    <div class="description">
      <h5>Beschrijving:</h5><br>
        {{!!$monitor->long_description!!}}
    </div><br>
        <table class="table">
        <tbody>
        <tr>
          <th>Beknopte specificaties</th>
          <td></td>
        </tr>
        <tr>
          <td><a href="#">Schermdiagonaal</a></td>
          <td>{{$monitor->screen_diameter}}</td>
        </tr>
        <tr>
          <td><a href="#">Resolutie</a></td>
          <td>{{$monitor->resolution}}</td>
        </tr>
      
      </tbody>
    </table><br>
</div>






@endsection

