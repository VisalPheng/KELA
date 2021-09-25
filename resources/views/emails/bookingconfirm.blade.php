@component('mail::message')
# Status for your Booking for {{ $booking->venue->name }}

**Booking Information**

**Booking Venue:** {{ $booking->venue->name }}

**Booking Timeslot:** {{ $booking->timeslot->starttime }} - {{ $booking->timeslot->endtime }}

**Customer Name:** {{ $booking->firstname }} {{ $booking->lastname }}

**Booking Date:** {{ $booking->bookingdate }}

@if($booking->status == 0)
Your booking is still pending. Click the link below to see your booking.
@elseif($booking->status == 1)
Your booking has been confirmed. Click the link below to see your booking.
@else
Your booking has been rejected. Click the link below to see your booking.
@endif

@component('mail::button', ['url' => config('app.url'), 'color' => 'red'])
Go to KELA
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
