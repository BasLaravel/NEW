@extends('account.account-page')

@section('account')
<div style="margin-left:55px;">
  <h2>Persoonlijke Gegevens</h2>
  <p>@if(isset(Auth::user()->confirmed) && Auth::user()->confirmed) <span style="font-size:30px;color:green;"> &#10004; </span>Uw account is geactiveerd
  @else <span style="font-size:30px;color:red;"> &#10008; </span>
  Uw account is nog niet geactiveerd, bevestig door op de link in de bevestigings e-mail te klikken die wij u hebben gestuurd. </p>
  <p><a href="{{route('account.adres.mailer')}}">Stuur mij een nieuwe bevestigings e-mail</a></p> @endif
<h5>Vul hier alvast uw gegevens in zodat u makkelijk kunt bestellen.</h5>

<form class="mt-4" action="{{route('account.adres.store')}}" method="POST" >
  @csrf
  <!-- aanhef -->
  <div class="">
      <p class="" style="margin-bottom:4px;">Aanhef*</p>
      <div class="form-check form-check-inline">
        <input class="form-check-input{{ $errors->has('aanhef') ? ' is-invalid' : '' }}" type="radio" name="aanhef" id="man" value="dhr"
        @if(isset($information->aanhef) && ($information->aanhef == 'dhr')) checked @else  @endif required>
        <label class="form-check-label" for="man">dhr.</label>
        </div>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input{{ $errors->has('aanhef') ? ' is-invalid' : '' }}" type="radio" name="aanhef" id="mevr" value="mevr"
          @if(isset($information->aanhef) && ($information->aanhef == 'mevr')) checked @else  @endif>
          <label class="form-check-label" for="mevr">mevr.</label>
      </div>
      @if ($errors->has('aanhef'))
        <span class="invalid-feedback">
          <p><strong>{{ $errors->first('aanhef') }}</strong></p>
        </span>
      @endif
  </div>
  <div class="form-row mt-3">
    <div class="form-group col-md-4">
      <label for="naam">Naam*</label>
      <input type="text" class="form-control{{$errors->has('voor_naam') ? ' is-invalid' : '' }}"  id="naam"  name="voor_naam"
      value="{{(isset($information->voor_naam)) ? "$information->voor_naam":""}}" required>
      @if ($errors->has('voor_naam'))
        <span class="invalid-feedback">
          <p><strong>{{ $errors->first('voor_naam') }}</strong></p>
        </span>
      @endif
    </div>
    <div class="form-group col-md-2">
      <label for="tussenvoegsel">Tussenvoegsel</label>
      <input type="text" class="form-control{{ $errors->has('tussenvoegsel') ? ' is-invalid' : '' }}" id="tussenvoegsel" value="{{(isset($information->tussenvoegsel)) ? "$information->tussenvoegsel":""}}"
      name="tussenvoegsel">
      @if ($errors->has('tussenvoegsel'))
        <span class="invalid-feedback">
          <p><strong>{{ $errors->first('tussenvoegsel') }}</strong></p>
        </span>
      @endif
    </div>
    <div class="form-group col-md-4">
      <label for="achternaam">Achternaam*</label>
      <input type="text" class="form-control{{ $errors->has('achter_naam') ? ' is-invalid' : '' }}" id="achternaam" value="{{(isset($information->achter_naam)) ? "$information->achter_naam":""}}"
      name="achter_naam" required>
      @if ($errors->has('achter_naam'))
        <span class="invalid-feedback">
          <p><strong>{{ $errors->first('achter_naam') }}</strong></p>
        </span>
      @endif
    </div>
  </div>
  <div class="form-group row col-md-4">
    <label for="country">Land*</label>
    <input type="text" class="form-control{{ $errors->has('land') ? ' is-invalid' : '' }}" id="country" value="{{(isset($information->land)) ? "$information->land":""}}"
    name="land" required>
    @if ($errors->has('land'))
      <span class="invalid-feedback">
        <p><strong>{{ $errors->first('land') }}</strong></p>
      </span>
    @endif
  </div>
  <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label for="postcode">Postcode*</label>
      <input type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" id="postcode" placeholder="" value="{{(isset($information->postcode)) ? "$information->postcode":""}}"
      name="postcode" aria-describedby="postcode-small" required>
      <small id="postcode-small" class="form-text text-muted"></small>
      @if ($errors->has('postcode'))
        <span class="invalid-feedback">
          <p><strong>{{ $errors->first('postcode') }}</strong></p>
        </span>
      @endif
    </div>
    <div class="form-group col-md-3.5">
      <label for="huisnummer">Huisnummer* + toevoeging</label>
      <input type="text" class="form-control{{ $errors->has('huisnummer') ? ' is-invalid' : '' }}" id="huisnummer" placeholder="" value="{{(isset($information->huisnummer)) ? "$information->huisnummer":""}}"
      name="huisnummer" required>
      @if ($errors->has('huisnummer'))
        <span class="invalid-feedback">
          <p><strong>{{ $errors->first('huisnummer') }}</strong></p>
        </span>
      @endif
    </div>
  </div>
  <div class="form-group row col-md-4">
    <label for="straat">Straatnaam*</label>
    <input type="text" class="form-control{{ $errors->has('straat_naam') ? ' is-invalid' : '' }}" id="straat" placeholder="" value="{{(isset($information->straat_naam)) ? "$information->straat_naam":""}}"
    name="straat_naam" required>
    @if ($errors->has('straat_naam'))
    <span class="invalid-feedback">
      <p><strong>{{ $errors->first('straat_naam') }}</strong></p>
    </span>
    @endif
  </div>
  <div class="form-group row col-md-4">
    <label for="plaats">Plaatsnaam*</label>
    <input type="text" class="form-control{{ $errors->has('plaats_naam') ? ' is-invalid' : '' }}" id="plaats" placeholder="" value="{{(isset($information->plaats_naam)) ? "$information->plaats_naam":""}}"
    name="plaats_naam" required>
    @if ($errors->has('plaats_naam'))
      <span class="invalid-feedback">
        <p><strong>{{ $errors->first('plaats_naam') }}</strong></p>
      </span>
    @endif
  </div>
  <div class="form-group row col-md-4">
    <label for="geboortedatum">Geboortedatum (optioneel)</label>
    <input type="text" class="form-control{{ $errors->has('geboorte_datum') ? ' is-invalid' : '' }}" id="geboortedatum" placeholder="" value="{{(isset($information->geboorte_datum)) ? "$information->geboorte_datum":""}}" style=""
    name="geboorte_datum" aria-describedby="date-small">
    <small id="date-small" class="form-text text-muted">dd-mm-jjjj</small>
    @if ($errors->has('geboorte_datum'))
    <span class="invalid-feedback">
      <p><strong>{{ $errors->first('geboorte_datum') }}</strong></p>
    </span>
    @endif
  </div>
  <div class="form-group row col-md-4">
    <label for="tel">Telefoonnummer*</label>
    <input type="text" class="form-control{{ $errors->has('telefoonnummer') ? ' is-invalid' : '' }}" id="tel" placeholder="" style="" value="{{(isset($information->telefoonnummer)) ? "$information->telefoonnummer":""}}"
    name="telefoonnummer" required>
    @if ($errors->has('telefoonnummer'))
      <span class="invalid-feedback">
        <p><strong>{{ $errors->first('telefoonnummer') }}</strong></p>
      </span>
    @endif
    </div>
    <button type="submit" class="btn btn-primary">Verzend</button>
  </form>
</div>

@endsection
