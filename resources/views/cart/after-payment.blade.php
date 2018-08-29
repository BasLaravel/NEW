@extends('master')

@section('content')



<div class="container">
<div class="row mt-5">
    <div class="col-md-8 offset-2">
       <strong> <center>
    <p>Beste @if($order->user->adres->aanhef == 'dhr') Meneer @else Mevrouw @endif
        {{$order->user->adres->achter_naam}} bedankt voor uw bestelling.
    </p>
    <p>U heeft een email ontvangen met uw besteloverzicht.</p>

</center></strong>
</div>
</div>
</div>
@endsection