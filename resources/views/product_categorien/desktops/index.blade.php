@extends('master')

@section('content')
<div class="search-box">
    <form class="mb-5"  method="POST" action="{{ route('desktops.index') }}">
        @csrf
        <h6 class="mt-5">Merk</h6>
        @foreach($merken as $merk)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="{{$merk['specsTag']}}" name="brand[]" value="{{$merk['specsTag']}}"
            onchange='this.form.submit()' {{(isset($old) && in_array($merk['specsTag'],$old))? 'checked':""}} >{{$merk['specsTag']}}
            <label class="form-check-label" for="{{$merk['specsTag']}}"></label>
        </div >
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


<div class="container">
    @forelse($desktops as $desktop)
    <hr>
    <div class="row mt-5">
        <div class="col-4">
            <img class="card-img-top" src="{{$desktop->image_large}}" height=350px alt="Product image cap">
        </div>
        <div class="col-8">
            <h5 class="card-title">{{$desktop->title}}</h5>
            <p class="card-text">{{ str_limit($desktop->short_description, $limit = 250, $end ='...')}}
                <a href="{{ route('desktops.show', [$desktop->id]) }}">Meer...</a>
            </p>
            <h5 align="right" class="card-title">{{$desktop->price}} Euro</h5>
            <a href="{{route('addToCart', [$desktop->ean])}}" class="btn btn-primary shoppingcart">In winkelwagen</a>
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
</div>

<script>
// // producten toevoegen in de winkelwagen via een ajax request
// $('.shoppingcart').on("click",function(e){
//   e.preventDefault();
//   //alert('tst');
//   $.ajax({
//        url: "@if(isset($desktop)) {{route('addToCart',[$desktop->ean])}} @else  @endif",
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
