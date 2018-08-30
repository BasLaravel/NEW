@extends('master')

@section('content')
<div class="search-box">
    <form class="mb-5"  method="POST" action="{{ route('monitors.index') }}">
        @csrf
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

        <h6 class="mt-5">Resolutie</h6>
        @foreach($resolution as $resolution)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="{{$resolution->resolution}}" name="resolution[]"
            value="{{$resolution->resolution}}" onchange='this.form.submit()'
            {{(isset($old) && in_array($resolution->resolution,$old))? 'checked':""}}>{{$resolution->resolution}}
            <label class="form-check-label" for="{{$resolution->resolution}}"></label>
        </div>
        @endforeach
    </form>
</div>

<div class="container" >
    @forelse($monitors as $monitor)
    <hr>
    <div class="row mt-5">
        <div class="col-4">
            <img class="card-img-top" src="{{$monitor->image_large}}"  alt="Product image cap">
        </div>
        <div class="col-8">
            <h5 class="card-title">{{$monitor->title}}</h5>
            <p class="card-text">{{ str_limit($monitor->short_description, $limit = 250, $end ='...')}}
                <a href="{{ route('monitors.show', [$monitor->id]) }}">Meer...</a>
            </p>
            <h5 align="right" class="card-title">€ {{$monitor->price}},-</h5>
            <a href="{{route('addToCart', [$monitor->ean])}}" class="btn btn-primary shoppingcart">In winkelwagen</a>
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

@endsection
