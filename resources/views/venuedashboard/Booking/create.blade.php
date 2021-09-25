@extends('venuedashboard.layout')
@extends('venuedashboard.bootstrap')
@section('title', 'Booking Venue | KELA Venue Owner')
@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<div class="fluid-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Booking Venue') }}</h2>
                </div>
                <div class="col-auto">

                    <a href="{{route('venuedashboard.booking.all')}}" class="btn btn-primary" style="color:white">
                        <span style="color:white"></span> {{ __('Back') }}
                    </a>

                </div>
            </div>
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('venuedashboard.dashboard')}}">{{
                                        __('Dashboard') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('venuedashboard.booking.all')}}">{{
                                        __('Bookings') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Booking Venue') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('venue.booking.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bookingid" value="{{$bookingid}}">
                        <div class="form-group">
                            <label for="firstname">First Name <span class="require"></label>
                            <input type="text" class="form-control" name="firstname" />
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name <span class="require"></label>
                            <input type="text" class="form-control" name="lastname" />
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="phonenumber">Phone Number <span class="require"></label>
                            <input type="tel" class="form-control" name="phonenumber" />
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="require"></label>
                            <input type="text" class="form-control" name="email" />
                        </div>

                        <div class="form-group">
                            <label for="venue">Venue</label>
                            <select class="form-control selectpicker" data-style="btn-danger" id="venue_id"
                                name="venue_id" multiple>
                                @foreach ($venues as $venue)
                                <option value="{{$venue->id}}">{{$venue->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="timeslot">Timeslot</label>
                            <select class="form-control selectpicker" data-style="btn-danger" id="timeslot_id"
                                name="timeslot_id" multiple>
                                @foreach ($timeslots as $timeslot)
                                <option value="{{$timeslot->id}}">{{ $timeslot->starttime }} - {{ $timeslot->endtime }} - {{ $timeslot->venue->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="datepicker" placeholder="Select your booking date" name="bookingdate" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-lg float-right">
                            <i class='bx bx-list-plus' ></i> Book
                            </button>
                        </div>
        
                    </form>
            </div>
        </div> <!-- / .card -->
    </div> <!-- .col-12 -->
</div> <!-- .row -->
</div> <!-- .container-fluid -->
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