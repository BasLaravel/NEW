@extends('account.account-page')

@section('account')
<div style="margin:15px;">
<h2>Persoonlijke Gegevens</h2>

<form class="mt-4" action="route('account.persoonlijk.store')" method="POST" >
@csrf
<!-- aanhef -->


<div class="">
    <p class="" style="margin-bottom:4px;">Aanhef*</p>
    <div class="form-check form-check-inline">
    <input class="form-check-input{{ $errors->has('aanhef') ? ' is-invalid' : '' }}" type="radio" name="aanhef" id="man" value="man" checked>
    <label class="form-check-label" for="man">dhr.</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input{{ $errors->has('aanhef') ? ' is-invalid' : '' }}" type="radio" name="aanhef" id="mevr" value="vrouw">
    <label class="form-check-label" for="mevr">mevr.</label>
    </div>
</div>


 <div class="form-row mt-3">
    <div class="form-group col-md-4">
      <label for="naam">Naam*</label>
      <input type="text" class="form-control" id="naam" placeholder="" value="{{(isset($information->voor_naam)) ? "$information->voor_naam":""}}">
    </div>
    <div class="form-group col-md-2">
      <label for="tussenvoegsel">Tussenvoegsel</label>
      <input type="password" class="form-control" id="tussenvoegsel" placeholder="">
    </div>
    <div class="form-group col-md-4">
      <label for="achternaam">Achternaam*</label>
      <input type="password" class="form-control" id="achternaam" placeholder="">
    </div>
  </div>

   <div class="form-group row col-md-4">
    <label for="country">Land*</label>
    <input type="text" class="form-control" id="country" placeholder="" style="">
  </div>

  <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label for="postcode">Postcode*</label>
      <input type="text" class="form-control" id="postcode" placeholder="" value="{{(isset($information->postcode)) ? "$information->postcode":""}}">
    </div>
    <div class="form-group col-md-3.5">
      <label for="huisnummer">Huisnummer* + toevoeging</label>
      <input type="text" class="form-control" id="huisnummer" placeholder="" value="{{(isset($information->straat_nummer)) ? "$information->straat_nummer":""}}">
    </div>
  </div>

   <div class="form-group row col-md-4">
    <label for="straat">Straatnaam*</label>
    <input type="text" class="form-control" id="straat" placeholder="" value="{{(isset($information->straat_naam)) ? "$information->straat_naam":""}}">
  </div>

  <div class="form-group row col-md-4">
    <label for="geboortedatum">Geboortedatum (optioneel)</label>
    <input type="text" class="form-control" id="geboortedatum" placeholder="" value="{{(isset($information->geboorte_datum)) ? "$information->geboorte_datum":""}}" style="">
  </div>

    <div class="form-group row col-md-4">
    <label for="tel">Telefoonnummer*</label>
    <input type="text" class="form-control" id="tel" placeholder="" style="" value="{{(isset($information->telefoonnummer)) ? "$information->telefoonnummer":""}}">
  </div>

<button type="submit" class="btn btn-primary">Verzend</button>








 @if ($errors->has('aanrader'))
        <span class="invalid-feedback">
        <p><strong>{{ $errors->first('aanrader') }}</strong></p>  
        </span>             
      @endif   


  


</form>
</div>


@endsection