  <!-- reviews-samenvatting -->

  <div class="container">
    <div class="row" >
      <div class="card col-md-6" style="background-color:#95ebe6;">
        <div class="card-body">
          <h5 class="card-title">{{$laptop->title}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">@if($reviews->count() > 0)
              Totaal: {{$reviews->count()}} @if($reviews->count() == 1)review @else reviews @endif
            @else Er zijn nog geen reviews 
            @endif
          </h6><br>
          <p class="card-text">@if($aanrader == 70) <span style="color:green;"> &#10004;</span> 70% van de mensen vind dit een aanrader
           @elseif($aanrader == 69) <span style="color:red;"> &#10008; </span> 70% van de mensen vind dit geen aanrader 
           @else aanrader:  @endif</p>
          <p class="card-text">Gemiddeld cijfer Bedieningsgemak: {{$score_bedieningsgemak}}</p>
          <p class="card-text">Gemiddeld cijfer Gebruiksvriendelijkheid: {{$score_gebruiksvriendelijkheid}}</p>
          <p class="card-text">Gemiddeld cijfer Snelheid: {{$score_snelheid}}</p>
          <p class="card-text">Gemiddeld cijfer Mogelijkheden: {{$score_mogelijkheid}}</p>
        </div>
      </div>
    </div>
  </div>

