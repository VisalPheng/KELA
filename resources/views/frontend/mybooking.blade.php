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

@section('titlepage')

<title>My Booking | KELA</title>

@section('content')

<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">
    <section class="u-clearfix u-image u-shading u-section-1 shadow">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="d-flex justify-content-center">
                <h1 class="u-custom-font u-text u-text-default u-text-white u-text-1">My Booking</h1>
            </div>
        </div>
    </section>
    <div class="u-layout">
        <div class="u-layout-row">
            <div class="container py-3">
                @if ($bookings->isEmpty())
                <div class="d-flex justify-content-center py-5">
                    <div class="text-center py-3">
                        <div class="py-5">
                        <i class="bx bxs-bookmark-minus" style="font-size: 10rem; color:#fe2a43;"></i>
                        </div>
                        <h3 class="text-center" style="color:#fe2a43;">There aren't any bookings yet.</h3>
                    </div>
                  </div>
                @endif
                @if ($bookings->isNotEmpty())
                <h2 class="py-3 font-weight-bold">Recently Booking</h2>
                <div class="row row-cols-1 row-cols-md-2">
                @foreach($bookings as $booking)
                    <div class="col mb-4 py-3">
                        <div class="card shadow border border-warning">
                            <div class="card-header text-white bg-warning"></div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="user-info">
                                        <div class="user-info__basic">
                                            <h5 class="mb-0">{{ $booking->venue->name }}</h5>
                                            <p class="text-muted mb-0">{{ $booking->venue->address }}</p>
                                        </div>
                                    </div>
                                    <div class="dropdown open">
                                        <a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" style="color: #F7444E;"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId1">
                                            <a class="dropdown-item text-info" href="{{ route('mybooking.receipt',$booking->id) }}"><i class="fas fa-receipt mr-1"></i> Receipt</a>
                                            <form action="{{ route('BookingCancel',$booking->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash mr-1"></i> Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="mb-0">{{ $booking->venue->phonenumber }}</h6>
                                <div class="d-flex justify-content-between mt-4">
                                    <div>
                                        <h5 class="mb-0">{{ $booking->timeslot->starttime }} - {{ $booking->timeslot->endtime }}
                                            <small class="ml-1">{{ $booking->bookingdate }}</small>
                                        </h5>
                                    </div>
                                    @if($booking->status == 0)
                                    <span class="text-info font-weight-bold">Pending</span>
                                    @elseif($booking->status == 1)
                                    <span class="text-success font-weight-bold">Confirmed</span>
                                    @elseif($booking->status == 2)
                                    <span class="text-danger font-weight-bold">Rejected</span>
                                    @else
                                    <span class="text-secondary font-weight-bold">Postponed</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {!! $bookings->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
@endsection