@extends('dashboard.bootstrap')
@extends('master')

<link rel="stylesheet" href="{{asset('css/booking.css')}}">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@section('titlepage')

<title>Booking | KELA</title>

@section('content')
<section class="u-clearfix u-section-1" id="sec-6963">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-39 u-layout-cell-1">
                <div class="u-container-layout u-valign-bottom-lg u-valign-bottom-md u-valign-bottom-sm u-valign-top-xs u-container-layout-1">
                  <h3 class="u-custom-font u-text u-text-default u-text-1">Booking Information</h3>
                  <div class="u-form u-form-1">
                  <form action={{route('storeBooking')}} method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form">
                    <input type="hidden" name="bookingid" value="{{$bookingid}}">
                    <input type="hidden" name="timeslot_id" id="id" value="{{$timeslot->id}}">
                    <input type="hidden" name="venue_id" id="id" value="{{$timeslot->venue->id}}">
                    <div class="u-form-group u-form-partition-factor-2 u-form-group-1">
                        <label for="text-2ac1" class="u-label u-label-1">First Name</label>
                        <input type="text" id="text-2ac1" name="firstname" class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" placeholder="Enter your first name" required>
                      </div>
                      <div class="u-form-group u-form-partition-factor-2 u-form-group-2">
                        <label for="text-f01a" class="u-label u-label-2">Last Name</label>
                        <input type="text" placeholder="Enter your last name" id="text-f01a" name="lastname" class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required>
                      </div>
                      <div class="u-form-group u-form-group-3">
                        <label for="text-40d1" class="u-label u-label-3">Address</label>
                        <input type="text" placeholder="Enter your address" id="text-40d1" name="address" class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required>
                      </div>
                      <div class="u-form-group u-form-phone u-form-group-4">
                        <label for="phone-061c" class="u-label u-label-4">Phone Number</label>
                        <input type="tel" placeholder="Enter your phone" id="phone-061c" name="phonenumber" class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required>
                      </div>
                      <div class="u-form-group u-form-group-5">
                        <label for="text-91d8" class="u-label u-label-5">Email</label>
                        <input type="text" placeholder="Enter your email" id="text-91d8" name="email" class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required>
                      </div>
                      <div class="u-form-group u-form-group-6">
                        <input id="datepicker" placeholder="Select your booking date" name="bookingdate" required>
                      </div>
                      <div class="u-align-right u-form-group u-form-submit u-form-group-6 py-3">
                      <button type="submit" class="btn btn-danger btn-lg btn-block">
                                Book
                            </button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-21 u-layout-cell-2">
                <div class="u-container-layout u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-2">
                  <h2 class="u-custom-font u-text u-text-default u-text-2">Your Booking</h2>
                  <div class="u-table u-table-responsive u-table-1">
                    <table class="u-table-entity">
                      <colgroup>
                        <col width="55%">
                        <col width="45%">
                      </colgroup>
                      <tbody class="u-table-body">
                        <tr style="height: 44px;">
                          <td class="u-align-center u-border-2 u-border-grey-dark-1 u-custom-font u-grey-70 u-table-cell u-text-body-alt-color u-table-cell-1">Venue</td>
                          <td class="u-align-center u-border-2 u-border-grey-dark-1 u-custom-font u-grey-70 u-table-cell u-text-body-alt-color u-table-cell-2">Time Slots</td>
                        </tr>
                        <tr style="height: 44px;">
                          <td class="u-align-center u-border-2 u-border-grey-dark-1 u-table-cell">{{ $timeslot->venue->name }}</td>
                          <td class="u-align-center u-border-2 u-border-grey-dark-1 u-table-cell">{{ $timeslot->starttime }} - {{ $timeslot->endtime }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
       $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'materialicons',
            format: 'yyyy-mm-dd',
            autoclose: true,
            disableDates: function(date) {
              const currentDate = new Date().setHours(0,0,0,0);
              return date.setHours(0,0,0,0) >= currentDate ? true : false;
            }
        });
    </script>
@endsection