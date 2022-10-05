@component('mail::message')
# Email System 

Sending You A welcome Email.

The mail has been Sent 

Thankyou.!!

@component('mail::button', ['url' => ''])
Send?
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
