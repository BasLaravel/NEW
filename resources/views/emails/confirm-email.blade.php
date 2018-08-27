@component('mail::message')
# Introduction

Confirmeer uw email-adres aub.

@component('mail::button', ['url' => url('http://bas.codeaap.nl/NEW/public/register/confirm?token='.$user->confirmation_token)])
Confirm email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent