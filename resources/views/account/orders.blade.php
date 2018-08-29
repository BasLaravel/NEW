@extends('account.account-page')

@section('account')

<div style="margin-left:55px;">
    <h3>Uw orders</h3>
<ul class="list-group">
@foreach($orders as $order)
    @foreach($order as $order)
    <li class="list-group-item disabled">{{$order['title']}}</li>
    @endforeach
@endforeach
</ul>
</div>



@endsection