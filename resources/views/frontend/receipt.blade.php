@extends('dashboard.bootstrap')
@extends('master')


<link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="{{asset('css/mybooking.css')}}">
<link rel="stylesheet" href="{{asset('css/receipt.css')}}">

@section('titlepage')

<title>My Receipt | KELA</title>

@section('content')

<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">
    <section class="u-clearfix u-image u-shading u-section-1 shadow">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="d-flex justify-content-center">
                <h1 class="u-custom-font u-text u-text-default u-text-white u-text-1">My Receipt</h1>
            </div>
        </div>
    </section>
    <div class="u-layout">
        <div class="u-layout-row">
            <div class="container py-3">
                <div class="card-body">
                    <div class="bill">
                        <section id="bill-print" class="bill-print">
                            <div class="bill-print-header">
                              <h1 style="padding-bottom: 1rem;">KELA</h1>
                              <p style="font-size: 20px">{{ $booking->venue->name }}</p>
                              <p>
                                <span style="font-size: 14px;">{{ $booking->venue->address }}</span>
                              </p>
                              <p>{{ $booking->venue->phonenumber }}</p>
                              <p>
                                <span style="font-weight: bold;">Receipt Date: </span>
                                <span>{{ $booking->created_at->format('Y-m-d') }}</span>
                              </p>
                            </div>
                            <div class="bill-print-user">
                              <p class="bill-print-customer-name">
                                <span>Customer:</span>
                                <span>{{ $booking->firstname }} {{ $booking->lastname }}</span>
                              </p>
                              <p class="bill-print-customer-phonenumber">
                                <span>Phone Number:</span>
                                <span>{{ $booking->phonenumber }}</span>
                              </p>

                            </div>
                            <div class="bill-print-products">
                              <p>
                                <span>Venue</span>
                                <span>Time</span>
                              </p>
                                <p>
                                  <span style="width: 100px">Venue #{{ $booking->venue->id }}</span>
                                  <span>{{ $booking->timeslot->starttime }} - {{ $booking->timeslot->endtime }}</span>
                                </p>
                            </div>
                            <div class="bill-print-status">
                                <p class="bill-print-customer-status">
                                    <span>Status:</span>
                                    <span>
                                        @if($booking->status == 0)
                                        <span>Pending</span>
                                        @elseif($booking->status == 1)
                                        <span>Confirmed</span>
                                        @elseif($booking->status == 2)
                                        <span>Rejected</span>
                                        @else
                                        <span>Postponed</span>
                                        @endif
                                    </span>
                                  </p>
                                  <p>
                                  <span>Booking Date:</span>
                                    <span>
                                      {{ $booking->bookingdate }}
                                    </span>
                                  </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                  <p>{!! QrCode::generate($booking->bookingid); !!}</p>
                                </div>
                                <div class="d-flex justify-content-center py-2">
                                  <p style="font-weight: bold;">KELA - {{ $booking->bookingid }}</p>
                                </div>
                          </section>
                          <section class="bill-actions">
                            <button id="print">Print</button>
                          </section>
                          <script>
                            (function() {
                              let printButton = document.querySelector('#print');
                              
                              printButton.addEventListener( 'click', function( e ) {
                                window.print();
                              });
                              
                            })();
                          </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection