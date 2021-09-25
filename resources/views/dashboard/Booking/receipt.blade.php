@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'Booking Receipt | KELA Administrator')
<link rel="stylesheet" href="{{asset('css/receipt.css')}}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Booking Receipt') }}</h2>
                </div>
                <div class="col-auto">

                    <a href="{{route('admin.booking.all')}}" class="btn btn-primary" style="color:white">
                        <span style="color:white"></span> {{ __('Back') }}
                    </a>

                </div>
            </div>
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{
                                        __('Dashboard') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.booking.all')}}">{{
                                        __('Booking') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Booking Receipt') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
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
            </div> <!-- / .card -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection