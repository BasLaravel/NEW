@extends('master')

@section('content')


<div class="container">
    @forelse($search as $search)
    <hr>
    <div class="row mt-5">
        <div class="col-4">
            <img class="card-img-top" src="{{$search->image_large}}"  alt="Product image cap">
        </div>
        <div class="col-8">
            <h5 class="card-title">{{$search->title}}</h5>
            <p class="card-text">{{ str_limit($search->short_description, $limit = 250, $end ='...')}}</p>
            
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