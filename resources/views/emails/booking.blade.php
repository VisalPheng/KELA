@component('mail::message')
# Booking Received

Thank you for your Booking.

**Booking Information**

**Booking Venue:** {{ $bookingplaced->venue->name }}

**Booking Timeslot:** {{ $bookingplaced->timeslot->starttime }} - {{ $bookingplaced->timeslot->endtime }}

**Customer Name:** {{ $bookingplaced->firstname }} {{ $bookingplaced->lastname }}

**Booking Date:** {{ $bookingplaced->bookingdate }}

@component('mail::button', ['url' => config('app.url'), 'color' => 'red'])
Go to KELA
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
