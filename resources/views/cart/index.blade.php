
@extends('master')

@section('content')

<div id="cart2" class="container align-self-center">
<center><div id="Navcart" class="row">
  <div class="cartnav"><p>Winkelwagen</p></div>
  <div class="ordernav"><p>Bestellen</p></div>
  <div class="confnav"><p>Bevestiging</p></div>
</div></center>
<h1 class="cartnav2" style="font-weight:bold;">Winkelwagentje <img src="{{asset('img/Winkelwagentje.png')}}" style="max-width:50px;"></h1><br>
@if ($data->count() == 0)
<p>Er zitten geen producten in uw winkelwagentje.</p>
@else
@foreach($data as $product)
  <div id="shoppingcart" class="row" style="background:white!important;padding:15px;">
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
  <br>
  <!-- <hr style="height:1px;background-color:black;"> -->
  @endforeach
  @endif
    @inject('cart', 'Gloudemans\Shoppingcart\Cart')
    @if($cart->total() > 0)
      <table class="table">
        <tr>
          <td class = "colleft">Verzendkosten:</td>
          <td class = "colright">Gratis</td>
        </tr>
        <tr>
          <td  class = "colleft">Totaal:</td>
          <td  class = "colright">€<span id="total">{{$cart->subtotal()}}</span>,-</td>
        </tr>
        <tr>
          @endif
            <td><a class="btn2" class="btn btn-primary btn-lg" href="{{ route('home') }}" role="button">Verder winkelen</a></td>
            @if($cart->total() > 0)
              <td><a class="btn2" class="btn btn-primary btn-lg" href="{{ route('order.index') }}" role="button">Verder naar bestellen</a></td>
            @else
          @endif
        </tr>
    </table>


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
