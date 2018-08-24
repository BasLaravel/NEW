
@extends('master')

@section('content')

<div id="cart2" class="container align-self-center">
<h1 style="font-weight:bold;">Winkelwagentje <img src="{{asset('img/Winkelwagentje2.png')}}" style="max-width:100px;"></h1>
@if ($data->count() == 0)
<p>Er zitten geen producten in uw winkelwagentje.</p>
@else
@foreach($data as $product)
  <div id="shoppingcart" class="row" style="background:white!important;">
<table>
    <tr>
      <th colspan="3"><h6>{{$product->options->product->title}}</h6></th>
      <td></td>
      <td></td>
      <td></td>
      <td><a id= "knop" href="{{ route('cart.destroy', [$product->rowId]) }}">x</a></td>
    </tr>
    <tr>
      <td width="20%" align="center"><img src="{{$product->options->product->image_large}}" style="max-height:75px;"></td>
      <td colspan="2">{{ str_limit($product->options->product->short_description, $limit = 250, $end ='...')}}</td>
      <td width="20%" align="center"><input class="upCart" data-target={{$product->rowId}} size="2" type="number" name="qnty" value="{{$product->qty}}" autocomplete="off" style="max-width:50px;" min="1" max="30"></td>
      <td width="20%" align="center">€  <span class ="colom4"> {{$product->options->product->price*$product->qty}}</span>,-</td>
    </tr>
  </table>
  </div>
  <hr class="my-4">
  @endforeach
  @endif
    <a class="btn btn-primary btn-lg" href="{{ route('home') }}" role="button">Verder winkelen</a>
    @inject('cart', 'Gloudemans\Shoppingcart\Cart')
    @if($cart->total() > 0)
    <table class="Totaltable">
      <tr>
        <td class = "colleft">Verzendkosten:</td>
        <td class = "colright">Gratis</td>
      </tr>
      <tr>
        <td  class = "colleft">Totaal:</td>
       <td  class = "colright">€<span id="total">{{$cart->subtotal()}}</span>,-</td>
      </tr>
      <tr>
        <td></td>
        <td><a class="btn btn-primary btn-lg" href="{{ route('order.index') }}" role="button">Verder naar bestellen</a></td>
      </tr>
    </table>
    @endif

<script>


    $('.upCart').on('change', function(){
      var price_input = $(this).parent().next().find(">:first-child");
      var t = $(this).data("target");
      var y = $(this).parents().find('span').html();
      console.log(y);
      var newqnty = $(this).val();
      if(newqnty <= 0){alert('Voer geldige nummer in') }
      else {
        $.ajax({
          type: 'get',
          data:{
            id: t,
            qty: newqnty,
          },
          url:'{{route('cart.update')}}',

          success: function(response){
            price_input.html(response.price.price*response.price.qty);
            $('.itemcount').html(response.count);
            $('#total').html(response.price.price*response.price.qty);
            $('#subtotal').html(response.subtotal);
            $('#tax').html(response.tax);

          }
        });
      }


    });



</script>
  @endsection
