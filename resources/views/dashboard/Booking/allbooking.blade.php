@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'All Bookings | KELA Administrator')
@section('content')
<div class="fluid-container">
        <div class="row justify-content-center">
            <div class="col-md-12">                  
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('All Bookings') }}</h2>
                    </div>
                    <div class="col-auto">
                    <a href="{{route('admin.booking.exportxlsx')}}" class="btn btn-dark" style="color:white">
                        <span style="color:white"></span> {{ __('Export as XLSX') }}
                    </a>
                    <a href="{{route('admin.booking.exportcsv')}}" class="btn btn-dark" style="color:white">
                        <span style="color:white"></span> {{ __('Export as CSV') }}
                    </a>
                    <a href="{{route('admin.booking.createReservedBooking')}}" class="btn btn-danger" style="color:white">
                        <span style="color:white"><i class='bx bx-plus-circle' ></i></span> {{ __('Book') }}
                    </a>
                </div>
                </div>                  
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('All Bookings') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
<div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                @if($allbooking->isEmpty())
                                <div class="d-flex justify-content-center">
                                    <div class="text-center">
                                        <div class="py-5">
                                        <i class="bx bxs-message-square-x" style="font-size: 10rem; color:#fe2a43;"></i>
                                        </div>
                                        <h3 class="text-center" style="color:#fe2a43;">There's no records right now.</h3>
                                    </div>
                                </div>
                                @endif
                                @if($allbooking->isNotEmpty())
                                <div class="table-responsive">
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Venue</th>
                                                <th>Time</th>
                                                <th>{{ __('Date') }}</th>
                                                <th>Booking ID</th>
                                                <th>{{ __('First Name') }}</th>
                                                <th>{{ __('Last Name') }}</th>
                                                <th>{{ __('Address') }}</th>
                                                <th>{{ __('Phone Number') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Booked at') }}</th>
                                                <th width="200px">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        @foreach ($allbooking as $booking)
                                            <tbody>
                                                <tr class="text-center">
                                                    <td>{{ $booking->id }}</td>
                                                    <td>{{ $booking->venue->name }}</td>
                                                    <td>{{ $booking->timeslot->starttime }} - {{ $booking->timeslot->endtime }}</td>
                                                    <td>{{ $booking->bookingdate }}</td>
                                                    <td>KELA-{{ $booking->bookingid }}</td>
                                                    <td>{{ $booking->firstname }}</td>
                                                    <td>{{ $booking->lastname }}</td>
                                                    <td>{{ $booking->address }}</td>
                                                    <td>{{ $booking->phonenumber }}</td>
                                                    <td>{{ $booking->email }}</td>
                                                    <td>
                                                        @if($booking->status == 0)
                                                        <span class="badge badge-info">Pending</span>
                                                        @elseif($booking->status == 1)
                                                        <span class="badge badge-success">Confirmed</span>
                                                        @elseif($booking->status == 2)
                                                        <span class="badge badge-danger">Rejected</span>
                                                        @else
                                                        <span class="badge badge-secondary">Postponed</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                                                    <td style="width: 250px">
                                                            <a class="btn btn-primary mb-2" href="{{ route('admin.booking.edit',$booking->id) }}"><i class='bx bx-edit' ></i> {{ __('Edit') }}</a>
                                                            <a class="btn btn-info mb-2" href="{{ route('admin.booking.receipt',$booking->id) }}"><i class='bx bx-receipt'></i> {{ __('Receipt') }}</a>
                                                            {!! Form::open(['method' => 'DELETE','route' => ['admin.booking.destroy', $booking->id],'style'=>'display:inline']) !!}
                                                                <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure?')"><i class='bx bxs-trash-alt'></i> Delete</button>
                                                            {!! Form::close() !!}
                                                     </td>
                                                </tr>                                            
                                            </tbody>
                                        @endforeach
                                    </table>
                                    </div>
                                    @endif
                                    <div class="d-flex justify-content-center">
                                {!! $allbooking->links("pagination::bootstrap-4") !!}
                            </div>
                                <!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->        
  
@endsection