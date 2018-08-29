@component('mail::message')
# Introduction

<p>Bedankt voor het aanmelden bij NEW de moderne elektronica webshop</p>
<p>Om uw account te activeren druk op de knop "Bevestig account"</p>


@component('mail::button', ['url' => url('http://bas.codeaap.nl/NEW/public/register/confirm?token='.$user->confirmation_token)])
Bevestig account
@endcomponent

Bedankt namens het:<br>
{{ config('app.name') }} team
@endcomponent