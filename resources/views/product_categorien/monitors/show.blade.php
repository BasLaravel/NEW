@extends('master')

@section('content')

<li><a href="{{route('addToCart', [$monitor->ean])}}" id="winkelwagenBTN" class="btn btn-primary shoppingcart">In winkelwagen <img src="{{asset('img/Winkelwagentje.png')}}" alt="" style="max-width:50px;"></a></li><br>

<script>
// // producten toevoegen in de winkelwagen via een ajax request
// $('.shoppingcart').on("click",function(e){
//   e.preventDefault();
//   //alert('tst');
//   $.ajax({
//        url: "@if(isset($monitor)) {{route('addToCart',[$monitor->ean])}} @else  @endif",
//        type: "GET",
//        success: function (data) {
//         console.log(data);
//         $('#shopping-items').text(data);
//        },
//        error: function(xhr, ajaxOptions, thrownError){
//           //what to do in error
//        },
//        timeout : 15000//timeout of the ajax call
//   });
// });
</script>

@endsection