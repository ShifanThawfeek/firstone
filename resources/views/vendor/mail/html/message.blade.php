@component('mail::layout')

{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}
Welcome to <a href="{{ url('/') }}">Mataonme</a> and thank you for signing up with us.

You’re moments away from growing your 
social media accounts with powerful links.

<a href="{{ url('/upgrade') }}">Learn more about Basic, Pro and Student Benefit Program here.</a>

<p style="font-size: 12px;">Thanks again for joining our community.</p>

<p style="font-size: 12px;">
The Mataonme Team,<br>
All you need is just one link<br>
<a href="{{ url('/') }}">Mataonme.com</a>
</p>

<br>

<p style="font-size: 12px; text-align: center">
You are receiving this email because you subscribed to <a href="{{ url('/') }}">Mataonme</a>.
If you believe you are receiving this in error or did not sign up for this service, please unsubscribe.
</p>
<p style="font-size: 12px; text-align: center">
<!-- This email is intended for:  -->
</p>
<!-- Unsubscribe from the <a href="{{ url('/') }}">Mataonme</a> mailing list. -->


@endcomponent
