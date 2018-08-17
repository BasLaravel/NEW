
@extends('master')

@section('content')
<div id="cart2" class="container align-self-center">
  <p><h1 style="font-weight:bold;">Winkelwagentje <img src="{{asset('img/Winkelwagentje.png')}}" style="max-width:100px;"> </h1></p>
@if ($data->count() == 0)
@else
@foreach($data as $laptop)



<div id="shoppingcart" class="jumbotron" style="background:white!important;">
  <h1 class="display-5">{{$laptop->options->product->title}}</h1>
  <p><img src="{{$laptop->options->product->image_large}}" style="max-width:200px;"></p>
  <p class="lead display-20">{{ str_limit($laptop->options->product->short_description, $limit = 250, $end ='...')}}</p>
  <!-- <p>Aantal:</p><select class="" name="">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select> -->
  <hr class="my-4">
  <p>prijs €{{$laptop->options->product->price}},-</p>
  <a class="btn btn-primary btn-lg" href="{{ route('cart.destroy', [$laptop->rowId]) }}" role="button">verwijder</a>
</div>


@endforeach
@endif
</div>
@endsection
