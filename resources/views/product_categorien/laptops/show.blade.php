@extends('master')

@section('content')


<div class="container">
  <h3 class="card-title">{{$laptop->title}}</h3>
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
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" ><img class="d-block w-100" src="{{asset($laptop->image_1)}}" style="max-height:60px;"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"><img class="d-block w-100" src="{{asset($laptop->image_2)}}" style="max-height:60px;"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"><img class="d-block w-100" src="{{asset($laptop->image_3)}}" style="max-height:60px;"></li>
          </ol>
          <div class="carousel-inner ">
            <div class="carousel-item active">
              <a href=""><img class="d-block w-100" src="{{$laptop->image_1}}" alt="First slide" style="max-height:270px;"></a>
            </div>
            <div class="carousel-item">
              <a href=""><img class="d-block w-100" src="{{$laptop->image_2}}" alt="Second slide" style="max-height:270px;"></a>
            </div>
            <div class="carousel-item">
              <a href=""><img class="d-block w-100" src="{{$laptop->image_3}}" alt="Third slide" style="max-height:270px;"></a>
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
            <option value="NL">{{$laptop->summary}}</option>
          </select></li><br> -->
          <!-- <li><div class="price"> -->

          <!-- </div></li><br> -->
          <li><a  href="{{route('addToCart', [$laptop->ean])}}" id="winkelwagenBTN" class="btn btn-primary shoppingcart">In winkelwagen <img src="{{asset('img/Winkelwagentje.png')}}" alt="" style="max-width:50px;"></a></li><br>
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
        {{!!$laptop->long_description!!}}
    </div><br>
        <table class="table">
        <tbody>
        <tr>
          <th>Beknopte specificaties</th>
          <td></td>
        </tr>
        <tr>
          <td><a href="#">Schermdiagonaal</a></td>
          <td>{{$laptop->screen_diameter}}</td>
        </tr>
        <tr>
          <td><a href="#">Processor</a></td>
          <td>{{$laptop->processor}}</td>
        </tr>
        <!-- <tr>
          <td><a href="#">Ram-geheugen</a></td>
          <td>GB</td>
        </tr>
        <tr>
          <td><a href="#">Videokaart</a></td>
          <td>Nvidia GeForce</td>
        </tr>
        <tr>
          <td><a href="#">Opslagtype</a></td>
          <td>SSD</td>
        </tr> -->
        <!-- <tr>
          <td><a href="#">Bekijk alle specificaties</a></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr> -->
      </tbody>
    </table><br>
</div>


  <!-- reviews-samenvatting -->
  <div class="container">
    <div class="row" >
      <div class="card col-md-6 description">
        <div class="card-body">
          <h5 class="card-title">Gemiddeld cijfer: 7 | {{$laptop->title}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">@if($reviews->count() > 0)
              Totaal: {{$reviews->count()}} @if($reviews->count() == 1)review @else reviews @endif
            @else Er zijn nog geen reviews 
            @endif
          </h6><br>
          <p class="card-text">Gemiddeld cijfer Bedieningsgemak: 7</p>
          <p class="card-text">Gemiddeld cijfer Gebruiksvriendelijkheid: 7</p>
          <p class="card-text">Gemiddeld cijfer Snelheid: 7</p>
          <p class="card-text">Gemiddeld cijfer Mogelijkheden: 7</p>
          <a href="#" class="card-link">Geef een review</a>
        </div>
      </div>
    </div>
  </div>

<hr>

<!-- alle-reviews -->
<div class="container">
@forelse($reviews as $review)
  <div class="row mt-5 mb-5">
      <div class="card col-md-8">
        <div class="card-body">
          <h5 class="card-title">Review door: {{$review->naam}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Gemiddels cijfer die deze gebruiker gaf: 8
          </h6>
          <p class="card-text">Cijfer Bedieningsgemak: {{$review->bedieningsgemak *2}}</p>
          <p class="card-text">Cijfer Gebruiksvriendelijkheid: {{$review->gebruiksvriendelijkheid *2}}</p>
          <p class="card-text">Cijfer Snelheid: {{$review->snelheid *2}}</p>
          <p class="card-text">Cijfer Mogelijkheden: {{$review->mogelijkheid *2}}</p>
          
          <div class="card-header">
              Plus -en Minpunten
          </div>
          <ul class="list-group list-group-flush">
            <il class="list-group-item">+ {{$review->positieve_feedback_1}}</il>
            <il class="list-group-item">+ {{$review->positieve_feedback_2}}</il>
            <il class="list-group-item">+ {{$review->positieve_feedback_3}}</il>
            <il class="list-group-item">- {{$review->negatieve_feedback_1}}</il>
            <il class="list-group-item">- {{$review->negatieve_feedback_2}}</il>
            <il class="list-group-item">- {{$review->negatieve_feedback_3}}</il>
          </ul>

          <div class="card-header">
              Mening
          </div>
            <ul class="list-group list-group-flush">
              <il class="list-group-item"> {{$review->mening}}</il>
            </ul>
        </div>
      </div>
  </div>
@empty
<p>Geen reviews gevonden.</p>
@endforelse
</div><br>

<hr>

@auth
<!-- laptop-review-formulier -->
<div class="container">
  <div class="row">
    <h2 class=>Geef uw mening en schrijf een review</h2>

    <form class="mt-4" action="{{ route('laptops.review.store', [$laptop->id]) }}" method="POST">
    @csrf
      <div class="form-row mb-5">
        <div class="col-md-3">
          <p>1. Aanrader?</p>
        </div>
        <div class="col-md-4 offset-1">
            <div class="form-check {{ $errors->has('aanrader') ? ' is-invalid' : '' }}">
              <input class="form-check-input" type="radio" name="aanrader" id="radio_raad_aan" value="1" required>
              <label class="form-check-label" for="radio_raadaan">
                Ja, een aanrader.
              </label>
            </div> 
            <div class="form-check {{ $errors->has('aanrader') ? ' is-invalid' : '' }}">
                <input class="form-check-input" type="radio" name="aanrader" id="radio_raad_niet_aan" value="0">
                <label class="form-check-label" for="radio_raad_niet_aan">
                Nee, geen aanrader.
              </label>
            </div>
            
              <div class="form-check">
               @if ($errors->has('aanrader'))
            <span class="invalid-feedback">
            <p><strong>{{ $errors->first('aanrader') }}</strong></p>  
            </span>             
          @endif   
              
              </div>
        </div> 
      </div>

  <!-- checkboxes -->
      <div class="form-row mt-5 mb-5">
          <div class="col-sm-2">  
          2. Beoordeling
          </div>
          <div class="col-sm-3 offset-sm-2"> 
            <div  id="r1" class="rating {{ $errors->has('aanrader') ? ' is-invalid' : '' }}">
              <p style="padding-left:7%">  <strong>Bedieningsgemak</strong>  </p>
              <span>laag <input type="radio" name="be" id="str1" value="1" required><label for="str1"></label></span>
              <span><input type="radio" name="be" id="str2" value="2" ><label for="str2"> </label></span>
              <span><input type="radio" name="be" id="str3" value="3"><label for="str3"></label></span>
              <span><input type="radio" name="be" id="str4" value="4"><label for="str4"></label></span>
              <span><input type="radio" name="be" id="str5" value="5"><label for="str5"></label> hoog</span>
            </div>
          </div>
          <div class="col-sm-3 offset-sm-1">
            <div id="r2" class="rating">
              <p style="padding-left:7%"> <strong>Gebruiksvriendelijkheid</strong>  </p>
              <span>laag  <input type="radio" name="ge" id="ge1" value="1" required><label for="ge1"></label></span>
              <span><input type="radio" name="ge" id="ge2" value="2"><label for="ge2"></label></span>
              <span><input type="radio" name="ge" id="ge3" value="3"><label for="ge3"></label></span>
              <span><input type="radio" name="ge" id="ge4" value="4"><label for="ge4"></label></span>
              <span><input type="radio" name="ge" id="ge5" value="5"><label for="ge5"></label>  hoog</span>
            </div>
          </div>
      </div>
      <div class="form-row mt-5 mb-5">
          <div class="col-sm-3 offset-sm-4">
            <div class="rating">
              <p style="padding-left:7%">  <strong>Snelheid</strong>   </p>
              <span>laag  <input type="radio" name="sn" id="str1" value="1" required><label for="str1"></label></span>
              <span><input type="radio" name="sn" id="str2" value="2"><label for="str2"></label></span>
              <span><input type="radio" name="sn" id="str3" value="3"><label for="str3"></label></span>
              <span><input type="radio" name="sn" id="str4" value="4"><label for="str4"></label></span>
              <span><input type="radio" name="sn" id="str5" value="5"><label for="str5"></label>  hoog</span>
            </div>
          </div>
          <div class="col-sm-3 offset-sm-1">
            <div class="rating">
              <p style="padding-left:7%">  <strong>Mogelijkheden</strong>  </p>
              <span>laag <input type="radio" name="mo" id="str1" value="1" required><label for="str1"></label></span>
              <span><input type="radio" name="mo" id="str2" value="2"><label for="str2"></label></span>
              <span><input type="radio" name="mo" id="str3" value="3"><label for="str3"></label></span>
              <span><input type="radio" name="mo" id="str4" value="4"><label for="str4"></label></span>
              <span><input type="radio" name="mo" id="str5" value="5"><label for="str5"></label> hoog</span>
            </div>
          </div>
      </div>

<!-- plus -en minpunten -->
    <div class="form-row mt-5">
      <div class="col">
        <div class="input-group mb-2">
            <p>3. plus -en minpunten</p>
        </div>
      </div>
      <div class="col ml-2">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text" style="background-color:#90EE90;">+</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroup" name="positief_1" placeholder="positieve feedback">
        </div>
      </div>
      <div class="col ml-3">
        <div class="input-group mb-2">
            <div class="input-roup-prepend">
              <div class="input-group-text" style="background-color:#FF6347;">-</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroup" name="negatief_1" placeholder="minder leuke feedback">
        </div>
      </div>
     </div> 
     <div class="form-row">
      <div class="col offset-4">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text" style="background-color:#90EE90;">+</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroup" name="positief_2" placeholder="positieve feedback">
        </div>
      </div>
      <div class="col ml-3">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text" style="background-color:#FF6347;">-</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroup" name="negatief_2" placeholder="minder leuke feedback">
        </div>
      </div>
     </div>
     <div class="form-row mb-5"> 
      <div class="col offset-4">
        <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text" style="background-color:#90EE90;">+</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroup" name="positief_3" placeholder="positieve feedback">
        </div>
      </div>
      <div class="col ml-3">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text" style="background-color:#FF6347;">-</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroup" name="negatief_3" placeholder="minder leuke feedback">
        </div>
      </div>
     </div>

     <!-- textarea -->

      <div class="form-row mt-5 mb-5" >
        <div class="col-md-4">
          <p>4. Uw mening</p>
        </div>
        <div class="col-md-8">
          <label for="exampleFormControlTextarea1"></label>
          <textarea class="form-control {{ $errors->has('textarea') ? ' is-invalid' : '' }}" name="textarea" id="exampleFormControlTextarea1" rows="3"></textarea>
          @if ($errors->has('textarea'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('textarea') }}</strong>
            </span>             
          @endif   
        </div>
      
      </div>

        <!-- naam -->
      <div class="form-row mt-5 mb-5">
        <div class="col-md-4">
          <p>5. Uw Naam</p>
        </div>
        <div class="col-md-8">
          <input type="text" name="naam" class="form-control" id="naam" aria-describedby="naam1" placeholder="Uw naam">
          <small id="naam1" class="form-text text-muted">Als u dit veld niet invuld, zal de review anoniem worden verzonden.</small>
        </div>
      </div>

      <!-- verzendknop -->
      <div class="form-row mt-5 mb-5">
        <div class="col-md-8 offset-4">
          <button type="submit" class="btn btn-primary">Verzend</button>
        </div>
      </div>
    </form>
  </div>
</div>
@else
<p>Wilt u een review schrijven? <a href="{{route('login')}}">Log dan in...</a></p>
@endauth




<a href="{{route('addToCart',[$laptop->ean])}}" id="winkelwagenBTN" class="btn btn-primary shoppingcart">In winkelwagen <img src="{{asset('img/Winkelwagentje.png')}}" alt="" style="max-width:50px;"></a>
</div></center>
<!-- <h3>Alternatieven</h3>
<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="{{$laptop->image_large}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$laptop->title}}</h5>
    <p class="card-text">{{ str_limit($laptop->short_description, $limit = 70, $end ='...')}}</p>
    <a href="#" class="">Ondek meer...</a><br>
    <a class="link" href="#">
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar">&#9733;</p> -->
    <!-- Reviews</a>
    <p class="card-text">
      <div class="price">999,-</div>
    </p>
  </div>
</div>
<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="{{$laptop->image_large}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$laptop->title}}</h5>
    <p class="card-text">{{ str_limit($laptop->short_description, $limit = 70, $end ='...')}}</p>
    <a href="#" class="">Ondek meer...</a><br>
    <a class="link" href="#">
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar">&#9733;</p>
    Reviews</a>
    <p class="card-text">
      <div class="price">999,-</div>
    </p>
  </div>
</div>
<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="{{$laptop->image_large}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$laptop->title}}</h5>
    <p class="card-text">{{ str_limit($laptop->short_description, $limit = 70, $end ='...')}} </p>
    <a href="#" class="">Ondek meer...</a><br>
    <a class="link" href="#">
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar2">&#9733;</p>
      <p class="ratingstar">&#9733;</p>
    Reviews</a>
    <p class="card-text">
      <div class="price">999,-</div>
    </p>
  </div>
</div> -->

<!-- <h5>Specificaties</h5> -->
<!-- <table class="table">
<tbody>
<tr>
  <th scope="row">Product  </th>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Artikelnummer</a></td>
  <td>801414</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Fabrikantcode</a></td>
  <td>NX.GW1EH.001</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Merk</a></td>
  <td>Acer</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Garantie</a></td>
  <td>2 jaar</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Garantietype</a></td>
  <td>Carry-in-garantie</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Fabrieksgarantie</a></td>
  <td>--</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <th scope="row">Beeldscherm</th>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Schermdiagonaal</a></td>
  <td>15,6 inch</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Scherpte</a></td>
  <td>Full HD (1080p)</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Resolutie</a></td>
  <td>1920 x 1080 pixels</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Touchscreen</a></td>
  <td>--</td>
</tr>
<tr>
  <td><a href="#">&#10067; Schermcoating</a></td>
  <td>Mat</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Schermtype</a></td>
  <td>IPS paneel</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; FreeSync</a></td>
  <td>--</td>
</tr>
<tr>
  <td><a href="#">&#10067; G-Sync</a></td>
  <td>--</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Beeldscherm kwaliteit</a></td>
  <td>Middenklasse</td>
  <td></td>
  <td></td>
</tr>
<tr>
  <th>Processor</th>
  <td></td>
</tr>
<tr>
  <td><a href="#">&#10067; Processor</a></td>
  <td>Intel Core i5</td>
</tr>
<tr>
  <td><a href="#">&#10067; Processornummer</a></td>
  <td>8250U</td>
</tr>
<tr>
  <td><a href="#">&#10067; Processorkernen</a></td>
  <td>Quad core (4)</td>
</tr>
<tr>
  <td><a href="#">&#10067; Codenaam</a></td>
  <td>Kaby Lake R</td>
</tr>
<tr>
  <td><a href="#">&#10067; Kloksnelheid</a></td>
  <td>1600 MHz</td>
</tr>
<tr>
  <td><a href="#">&#10067; Turbo Frequency</a></td>
  <td>3400 MHz</td>
</tr>
<tr>
  <td><a href="#">&#10067; Trusted Platform Module (TPM)</a></td>
  <td>--</td>
</tr>
<tr>
  <td><a href="#">&#10067; Cache</a></td>
  <td>6 MB</td>
</tr>
<tr>
<th>Geheugen</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; RAM-geheugen</a></td>
<td>8 GB</td>
</tr>
<tr>
<td><a href="#">&#10067; Geheugen</a></td>
<td>SO-DIMM DDR4</td>
</tr>
<tr>
<td><a href="#">&#10067; Werkgeheugen uitbreidbaar</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Maximale hoeveelheid geheugen</a></td>
<td>8 GB</td>
</tr>
<tr>
<td><a href="#">&#10067; Samenstelling geheugen</a></td>
<td>2 x 4 GB</td>
</tr>
<tr>
<th>Opslag</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Opslagtype</a></td>
<td>SSD</td>
</tr>
<tr>
<td><a href="#">&#10067; Totale opslagcapaciteit</a></td>
<td>256 GB</td>
</tr>
<tr>
<td><a href="#">&#10067; Aantal schijven (intern)</a></td>
<td>1</td>
</tr>
<tr>
<td><a href="#">&#10067; Geheugenkaart</a></td>
<td>SD</td>
</tr>
<tr>
<td><a href="#">&#10067; Formaat harde schijf</a></td>
<td>M.2</td>
</tr>
<tr>
<th>Videokaart</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Videokaarttype</a></td>
<td>Dedicated</td>
</tr>
<tr>
<td><a href="#">&#10067; Videokaart</a></td>
<td>Nvidia GeForce MX130</td>
</tr>
<tr>
<td><a href="#">&#10067; Videogeheugen</a></td>
<td>2000 MB</td>
</tr>
<tr>
<td><a href="#">&#10067; Aantal GPU's videokaart</a></td>
<td>1</td>
</tr>
<tr>
<td><a href="#">&#10067; VR Ready</a></td>
<td>--</td>
</tr>
<tr>
<th>Draadloze verbindingen</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Draadloze verbinding</a></td>
<td>Bluetooth, Wifi</td>
</tr>
<tr>
<td><a href="#">&#10067; Wifi-standaard</a></td>
<td>Wireless AC</td>
</tr>
<tr>
<td><a href="#">&#10067; WiDi</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Bluetooth</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Bluetooth-versie</a></td>
<td>4.0</td>
</tr>
<tr>
<th>Bedrade verbindingen</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Aansluitingen</a></td>
<td>USB 3.0, USB Type A, USB Type C</td>
</tr>
<tr>
<td><a href="#">&#10067; USB aansluiting</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Type USB-connector</a></td>
<td>Standaard (Type A), Usb c</td>
</tr>
<tr>
<td><a href="#">&#10067; Aantal USB-poorten</a></td>
<td>4</td>
</tr>
<tr>
<td><a href="#">&#10067; Ondersteunde USB-C protocollen</a></td>
<td>USB 3.0</td>
</tr>
<tr>
<td><a href="#">&#10067; Aantal USB 2.0-poorten</a></td>
<td>2</td>
</tr>
<tr>
<td><a href="#">&#10067; Aantal USB 3.0-poorten</a></td>
<td>2</td>
</tr>
<tr>
<td><a href="#">&#10067; HDMI aansluiting</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Type HDMI-aansluiting</a></td>
<td>Standaard HDMI (Type A)</td>
</tr>
<tr>
<td><a href="#">&#10067; HDMI-uitgangen</a></td>
<td>1 x</td>
</tr>
<tr>
<td><a href="#">&#10067; HDMI-type</a></td>
<td>1.4</td>
</tr>
<tr>
<td><a href="#">&#10067; Netwerkaansluiting</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Thunderbolt</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; DisplayPort</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; VGA-poort</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Ethernetsnelheid</a></td>
<td>10 Gigabit Ethernet (10000 Mbps)</td>
</tr>
<tr>
<td><a href="#">&#10067; Hoofdtelefoonaansluiting</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Geheugenkaartlezer</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Geschikt voor docking station</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Optische aansluiting</a></td>
<td>--</td>
</tr>
<tr>
<th>Communicatie</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Mobiele dataverbinding</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Type dataverbinding</a></td>
<td>Geen</td>
</tr>
<tr>
<th>Audio</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Geintegreerde speakers</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Aantal speakers</a></td>
<td>Stereo</td>
</tr>
<tr>
<td><a href="#">&#10067; Aantal speakers</a></td>
<td>2</td>
</tr>
<tr>
<td><a href="#">&#10067; Ingebouwde microfoon</a></td>
<td>&#10004;</td>
</tr>
<tr>
<th>Camera</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Camera</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; RealSense</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Beeld-definitie webcam</a></td>
<td>HD Ready (720p)</td>
</tr>
<tr>
<th>Bediening</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Toetsenbordindeling</a></td>
<td>QWERTY</td>
</tr>
<tr>
<td><a href="#">&#10067; Lay-out toetsenbordindeling</a></td>
<td>US layout</td>
</tr>
<tr>
<td><a href="#">&#10067; Fysieke toetsenbordindeling</a></td>
<td>ANSI</td>
</tr>
<tr>
<td><a href="#">&#10067; Morsbestendig</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Numeriek keypad</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Programmeerbare toetsen</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Mechanische toetsen</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Verlicht toetsenbord</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Touchpad</a></td>
<td>&#10004;</td>
</tr>
<tr>
<td><a href="#">&#10067; Vingerafdruksensor</a></td>
<td>--</td>
</tr>
<tr>
<th>Besturingsysteem</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Besturingssysteem</a></td>
<td>Windows</td>
</tr>
<tr>
<td><a href="#">&#10067; Versie van Windows</a></td>
<td>Windows 10 Home</td>
</tr>
<tr>
<td><a href="#">&#10067; Taal besturingssysteem</a></td>
<td>Nederlands, Engels, Duits, Meerdere talen in te stellen</td>
</tr>
<tr>
<th>Accu</th>
<td></td>
</tr>
<td><a href="#">&#10067; Batterij technologie</a></td>
<td>Lithium-polymeer</td>
</tr>
<tr>
<td><a href="#">&#10067; Aantal cellen</a></td>
<td>5 uur</td>
</tr>
<tr>
<td><a href="#">&#10067; Accuduur</a></td>
<td>4</td>
</tr>
<tr>
<td><a href="#">&#10067; Stroomconnector</a></td>
<td>Standaard, Standaard USB</td>
</tr>
<tr>
<th>Gebruik</th>
<td></td>
</tr>
<td><a href="#">&#10067; Geschikt voor</a></td>
<td>Films kijken in Full HD, Foto's bewerken, HD-Films kijken, Internet, e-mail en tekstverwerken</td>
</tr>
<tr>
<td><a href="#">&#10067; Laptop geschikt voor</a></td>
<td>Lichte games als Minecraft</td>
</tr>
<tr>
<td><a href="#">&#10067; Snelheidsklasse</a></td>
<td>Middenklasse</td>
</tr>
<tr>
<td><a href="#">&#10067; Veiligheidsklasse</a></td>
<td>Basisklasse</td>
</tr>
<tr>
<th>Overige</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Model</a></td>
<td>Laptop</td>
</tr>
<tr>
<td><a href="#">&#10067; Awards</a></td>
<td>Geen</td>
</tr>
<tr>
<td><a href="#">&#10067; Garantie</a></td>
<td>2 jaar</td>
</tr>
<tr>
<td><a href="#">&#10067; Refurbished</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Kensington Lock</a></td>
<td>--</td>
</tr>
<tr>
<th>Fysieke eigenschappen</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Gewicht</a></td>
<td>2,2 kg</td>
</tr>
<tr>
<td><a href="#">&#10067; Materiaal</a></td>
<td>Kunststof (Plastic)</td>
</tr>
<tr>
<td><a href="#">&#10067; Kleur</a></td>
<td>Grijs</td>
</tr>
<tr>
<td><a href="#">&#10067; Breedte</a></td>
<td>38,16 cm</td>
</tr>
<tr>
<td><a href="#">&#10067; Diepte</a></td>
<td>26,3 cm</td>
</tr>
<tr>
<td><a href="#">&#10067; Hoogte</a></td>
<td>2,16 cm</td>
</tr>
<tr>
<td><a href="#">&#10067; Bouwkwaliteit</a></td>
<td>Basisklasse</td>
</tr>
<tr>
<th>Software</th>
<td></td>
</tr>
<tr>
<td><a href="#">&#10067; Microsoft Office meegeleverd</a></td>
<td>--</td>
</tr>
<tr>
<td><a href="#">&#10067; Geschikt voor Microsoft Office</a></td>
<td style="font-size:20px;">&#10004;</td>
</tr>
</tbody>
</table><br> -->







@endsection
