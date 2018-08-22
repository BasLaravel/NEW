@extends('account.account-page')

@section('account')

<div style="margin-left:55px;">
     <h2>Inlog Gegevens</h2>
     <h4>Verander hier uw emailadres en/of wachtwoord</h4>

     <form class="mt-4" action="{{route('account.inlog.store',[Auth::user()->id])}}" method="POST" >
    @csrf

        <div class="form-group row col-md-4">
            <label for="email">Email*</label>
            <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
             value="{{(isset($inlog->email)) ? "$inlog->email":""}}" name="email">
            @if ($errors->has('email'))
                    <span class="invalid-feedback">
                    <p><strong>{{ $errors->first('email') }}</strong></p>  
                    </span>             
                @endif   
        </div>

          <div class="form-group row col-md-4">
            <label for="wachtwoord">Nieuw wachtwoord*</label>
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="wachtwoord" name="password">
             @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

          <div class="form-group row col-md-4">
            <label for="bevestig">Bevestig wachtwoord*</label>
            <input type="password" class="form-control" id="bevestig" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Verzend</button>
    </form>
</div>


@endsection