@extends('master')

@section('content')

<div class="search-box">
    <form  method="POST" action="/laptops/search">
    @csrf
     @foreach($merken as $merk)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="{{$merk['specsTag']}}" name="merken[]" 

     
     {{ (is_array(old('merken')) and in_array('HP', old('merken'))) ? ' checked' : '' }}

        value="{{$merk['specsTag']}}" 

        onchange='this.form.submit()'>     {{$merk['specsTag']  }}
        <label class="form-check-label" for="{{$merk['specsTag']}}"></label>
    </div>
     @endforeach   
        <input type="submit" value="Submit">
    </form>   

 </div>

<div class="container">
    @foreach($laptops as $laptop)
    <hr>
    <div class="row mt-5">
        <div class="col-4">
            <img class="card-img-top" src="{{$laptop->image_large}}"  alt="Product image cap">
        </div>
        <div class="col-8">
            <h5 class="card-title">{{$laptop->title}}</h5>
            <p class="card-text">{{ str_limit($laptop->short_description, $limit = 250, $end ='...')}} 
                <a href="{{ route('laptops.show', [$laptop->id]) }}">Meer...</a>
            </p>
            <a href="#" class="btn btn-primary">In winkelwagen</a>  
        </div>
    </div>
    @endforeach
</div>

@endsection

