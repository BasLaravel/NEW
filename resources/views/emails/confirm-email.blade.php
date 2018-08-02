@component('mail::message')
# Introduction

Confirmeer uw email-adres aub.

@component('mail::button', ['url' => url('/register/confirm?token='.$user->confirmation_token)])
Confirm email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent