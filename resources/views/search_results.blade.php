@extends('master')

@section('content')


<div class="container">
    @foreach($search as $search)
        @foreach($search as $search)
            <hr>
            <div class="row mt-5">
                <div class="col-4">
                    <img class="card-img-top" src="{{$search->image_large}}"  alt="Product image cap">
                </div>
                <div class="col-8">
                    <h5 class="card-title">{{$search->title}}</h5>
                    <p class="card-text">{{ str_limit($search->short_description, $limit = 250, $end ='...')}}
                        <a href="{{ route($search->categorie.'.show', [$search->id]) }}">Meer...</a>
                    </p>
                    
                </div>
            </div>
        @endforeach
    @endforeach
</div>


@endsection