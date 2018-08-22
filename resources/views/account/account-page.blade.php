@extends('master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Accountoverzicht
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">  <a href="{{route('account.adres.show')}}">Persoonlijke Gegevens</a></li>
                    <li class="list-group-item">  <a href="{{route('account.inlog.show')}}">Inlog Gegevens</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            @yield('account')
        </div>
    </div>
</div>



@endsection
