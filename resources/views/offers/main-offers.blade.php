@extends('master')

@section('content')



<div class="container mb-5 mt-5">
    <h2>Onze aanbiedingen voor vandaag!</h2>
    <div class="row"> 
        @foreach($offers as $offer)
            @foreach($offer as $offer)
                <div class="card m-3" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset($offer->image_large)}}" height=200px; alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$offer->categorie}} € {{$offer->price}},- </h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$offer->title}} </h6>
                        <a href="{{ route($offer->categorie.'.show', [$offer->id]) }}">Meer...</a>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>






@endsection