@component('mail::message')
# Introduction

 <strong> <center>
    <p>Beste @if($order->user->adres->aanhef == 'dhr') Meneer @else Mevrouw @endif
        {{$order->user->adres->achter_naam}} bedankt voor uw bestelling.
    </p></strong>

   <p>Uw bestelling:</p>
    <ul>
    @foreach($cart as $item)
        <li>{{$item->name}}</li>
    @endforeach
      </ul>
    <br>
    <p>Wij versturen het naar het volgende adres:</p>
    <p>{{!!$order->user->adres->thisAdres()!!}}</p>



Bedankt namens het:<br>
{{ config('app.name') }} team
@endcomponent
