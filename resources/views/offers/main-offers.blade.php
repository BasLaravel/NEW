@extends('master')
@section('content')

<div class="container-fluid mr-5" >
    <div class="row m-5" > 
        <div class="col-md-9">
        <br>
        <br>
        <br>
        <h2>Onze aanbiedingen voor vandaag!</h2>
        <br>
            @foreach($offers as $offer)
                @foreach($offer as $offer)
                    <div class="card m-3" style="min-width:12rem;max-width:16rem;">
                        <img class="card-img-top" src="{{asset($offer->image_large)}}" height=200px; alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$offer->categorie}} € {{$offer->price}},- </h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$offer->title}}</h6>
                            <a href="{{ route($offer->categorie.'.show', [$offer->id]) }}">Meer...</a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
        <div class="col-md-3 align-self-start">
            <div class="card" style="min-width:12rem;max-width:16rem;">
                <div class="card-header">
                    Populaire producten op het moment
                </div>
                    <ul class="list-group list-group-flush">
                @forelse($populairProducts as $product)
                        <li class="list-group-item">
                           <a href="{{route($product["categorie"].'.show',[$product["id"]])}}">{{$product["title"]}}</a>
                        </li>
                 @empty  
                 <li class="list-group-item">
                    <p>Er zijn nog geen producten zichtbaar</p>
                  </li>         
                @endforelse   
                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection