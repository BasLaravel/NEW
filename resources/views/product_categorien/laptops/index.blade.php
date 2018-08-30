@extends('master')

@section('content')
<div class="search-box">
    <form class="mb-5"  method="POST" action="{{ route('laptops.index') }}">
        @csrf
        <!-- prijsschuif -->
        <input type="hidden" name ="old_price" value="{{$max+500}}">
        <h6 class="mt-5">Richtprijs</h6>
            <div >
                <input style="width:90%;" id="prijs" type="range" min="{{$min}}" max="{{$max+500}}" name="price"  id="fader"
                 step="10" oninput="outputUpdate(value)" onmouseup='this.form.submit()'
                 @if(isset($old['priced']) && ($old['priced']>10)) value={{$old['priced']}}
                @else value={{$max+500}} @endif
                 >
                 <p>
                   <label for="amount">Price range:</label>
                   <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                 </p>
            </div>
            <div id="slider-range" style="margin-top:-50px;">
                <p style="display:flex;">
                    <output for="fader" id="price_low">{{$avg-100}}</output>
                    <output  for="fader" id="price_high" style="margin-left:auto;">{{$avg+100}}</output>
                </p>
            </div>
            <h6 class="mt-5">Merk</h6>
            @foreach($merken as $merk)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="{{$merk['specsTag']}}" name="brand[]" value="{{$merk['specsTag']}}"
                onchange='this.form.submit()' {{(isset($old) && in_array($merk['specsTag'],$old))? 'checked':""}} >{{$merk['specsTag']}}
                <label class="form-check-label" for="{{$merk['specsTag']}}"></label>
            </div >
            @endforeach

            <h6 class="mt-5">Diameter</h6>
            @foreach($screendiameter as $screendiameter)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="{{$screendiameter->screen_diameter}}" name="screendiameter[]"
                value="{{$screendiameter->screen_diameter}}" onchange='this.form.submit()'
                {{(isset($old) && in_array($screendiameter->screen_diameter,$old))? 'checked':""}}>{{$screendiameter->screen_diameter}}
                <label class="form-check-label" for="{{$screendiameter->screen_diameter}}"></label>
            </div>
            @endforeach

            <h6 class="mt-5">Processor</h6>
            @foreach($processor as $processor)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="{{$processor->processor}}" name="processor[]"
                value="{{$processor->processor}}" onchange='this.form.submit()'
                {{(isset($old) && in_array($processor->processor,$old))? 'checked':""}}>{{$processor->processor}}
                <label class="form-check-label" for="{{$processor->processor}}"></label>
            </div>
            @endforeach
    </form>
</div>

<div class="container" style="width:80%;margin-left:auto;">
    @forelse($laptops as $laptop)
    <hr>
    <div class="row mt-5 ml-auto" >
        <div class="col-lg-4 ml-auto">
            <img class="card-img-top" src="{{$laptop->image_large}}"  alt="Product image cap">
        </div>
        <div class="col-lg-8">
            <h5 class="card-title">{{$laptop->title}}</h5>
            <p class="card-text">{{str_limit($laptop->short_description, $limit = 250, $end ='...')}}
                <a href="{{ route('laptops.show', [$laptop->id]) }}">Meer...</a>
            </p>
            <h5 align="right" class="card-title">€ {{$laptop->price}},-</h5>
            <a class="btn btn-primary shoppingcart" href="{{route('addToCart',[$laptop->ean])}}">In winkelwagen</a>
        </div>
    </div>
    <!-- opvulling als er 1 product wordt gevonden -->
    @if($loop->count == 1)
    <div style="height:350px;">
    </div>
    @endif
    @empty
    <div style="height:650px;padding:100px">
        <p>Er zijn helaas geen producten gevonden</p>
    </div>
    @endforelse
    <div style="height:350px">

    </div>
</div>

<script>

$(document).ready(function(){

    if(!{{$priced}}){
        $('#price_low').val("Alle prijzen");
         $('#price_high').hide();
    }else {
    $('#price_low').val({{$priced}}-100);
    $('#price_high').val(parseFloat({{$priced}})+parseFloat(100)).show();
   }
});

function outputUpdate(vol) {
    if(vol<{{$max+50}}){
    $('#price_low').val(vol-100);
    $('#price_high').val(parseFloat(vol)+parseFloat(100)).show();
    }else{
        $('#price_low').val("Alle prijzen");
        $('#price_high').hide();
    }

}

</script>


@endsection
