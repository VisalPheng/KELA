@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'Dashboard | KELA Administrator')

@section('content')
    <div class="container-fluid">
        <h2 style="color: black;">Hi, {{ Auth::user()->name }} !!</h2>
        <p>There's something that you might want to check out below!!!</p>
        <div class="row">
            <div class="col-lg-8" style="padding-top: 2rem; padding-bottom: 2rem;">
                <div class="card shadow border border-info">
                    <div class="card-header text-white bg-info font-weight-bold">Overview</div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-3">
                            <div class="col mb-4">
                                <div class="card shadow text-white h-100 stats-card">
                                    <div class="card-body card-counter card1">
                                        <div class="row">
                                            <div class="col text-left my-auto">
                                                <i class='bx bx-user' style="font-size: 4rem;"></i>
                                            </div>
                                            <div class="col text-right my-auto">
                                                <h1 class="card-title">{{ $userCount }}</h1>
                                                <h4 class="card-title font-weight-bold count-name">Users</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="card shadow text-white h-100 stats-card">
                                    <div class="card-body card-counter card2">
                                        <div class="row">
                                            <div class="col text-left my-auto">
                                                <i class='bx bxs-compass' style="font-size: 4rem;"></i>
                                            </div>
                                            <div class="col text-right my-auto">
                                                <h1 class="card-title">{{ $locationCount }}</h1>
                                                <h4 class="card-title font-weight-bold count-name">Locations</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="card shadow text-white h-100 stats-card">
                                    <div class="card-body card-counter card3">
                                        <div class="row">
                                            <div class="col text-left my-auto">
                                                <i class='bx bx-current-location' style="font-size: 4rem;"></i>
                                            </div>
                                            <div class="col text-right my-auto">
                                                <h1 class="card-title">{{ $venueCount }}</h1>
                                                <h4 class="card-title font-weight-bold count-name">Venues</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="card shadow text-white h-100 stats-card">
                                    <div class="card-body card-counter card4">
                                        <div class="row">
                                            <div class="col text-left my-auto">
                                                <i class='bx bxs-bookmarks' style="font-size: 4rem;"></i>
                                            </div>
                                            <div class="col text-right my-auto">
                                                <h1 class="card-title">{{ $bookingCount }}</h1>
                                                <h4 class="card-title font-weight-bold count-name">Booking</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="card shadow text-white h-100 stats-card">
                                    <div class="card-body card-counter card5">
                                        <div class="row">
                                            <div class="col text-left my-auto">
                                                <i class='bx bxs-time' style="font-size: 4rem;"></i>
                                            </div>
                                            <div class="col text-right my-auto">
                                                <h1 class="card-title">{{ $timeslotCount }}</h1>
                                                <h4 class="card-title font-weight-bold count-name">Timeslots</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" style="padding-top: 2rem; padding-bottom: 2rem;">
                <div class="card shadow border border-danger">
                    <div class="card-header text-white bg-danger font-weight-bold">Booking</div>
                    <div class="card-body">
                        @if($allbookings->isEmpty())
                        <h5 class="text-center">There's no records right now.</h5>
                        @endif
                        @if($allbookings->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="thead text-white bg-danger">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Venue</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($allbookings as $booking)
                                  <tr>
                                    <th scope="row">{{ $booking->id }}</th>
                                    <td><a style="text-decoration: none; color: black;" href="{{ route('admin.booking.edit',$booking->id) }}">{{ $booking->venue->name }}</a></td>
                                    <td><a style="text-decoration: none; color: black;" href="{{ route('admin.booking.edit',$booking->id) }}">{{ $booking->timeslot->starttime }} - {{ $booking->timeslot->endtime }}</a></td>
                                    <td>{{ $booking->bookingdate }}</td>
                                    <td>{{ $booking->firstname }} {{ $booking->lastname }}</td>
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
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8" style="padding-top: 2rem; padding-bottom: 2rem;">
                <div class="card shadow border border-primary">
                    <div class="card-header text-white bg-primary font-weight-bold">Venue</div>
                    <div class="card-body">
                        @if($allvenues->isEmpty())
                        <h5 class="text-center">There's no records right now.</h5>
                        @endif
                        @if($allvenues->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="thead text-white bg-primary">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($allvenues as $venue)
                                  <tr>
                                    <th scope="row">{{ $venue->id }}</th>
                                    <th>
                                        <img src="{{asset("images/".$venue->img_url)}}" alt="Image"
                                        class="img-responsive" width="100px">
                                    </th>
                                    <th><a style="text-decoration: none; color: black;" href="{{ route('admin.venues.edit',$venue->id) }}">{{ $venue->name }}</a></th>
                                    <td>{!!Str::limit($venue->description, 200, ' (...)')!!}</td>
                                    <td>{!!Str::limit($venue->address, 100, ' (...)')!!}</td>
                                    <td>{{ $venue->phonenumber }}</td>
                                    <td>
                                        @if($venue->status == 0)
                                        <span class="badge badge-info">Pending</span>
                                        @elseif($venue->status == 1)
                                        <span class="badge badge-success">Approved</span>
                                        @elseif($venue->status == 2)
                                        <span class="badge badge-danger">Rejected</span>
                                        @else
                                        <span class="badge badge-secondary">Postponed</span>
                                        @endif
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4" style="padding-top: 2rem; padding-bottom: 2rem;">
                <div class="card shadow border border-warning">
                    <div class="card-header text-white bg-warning font-weight-bold">Timeslots</div>
                    <div class="card-body">
                        @if($alltimeslots->isEmpty())
                        <h5 class="text-center">There's no records right now.</h5>
                        @endif
                        @if($alltimeslots->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="thead text-white bg-warning">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Venue</th>
                                    <th scope="col">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($alltimeslots as $timeslot)
                                  <tr>
                                    <th scope="row">{{ $timeslot->id }}</th>
                                    <th><a style="text-decoration: none; color: black;" href="{{ route('admin.timeslots.edit',$timeslot->id) }}">{{ $timeslot->starttime }} - {{ $timeslot->endtime }}</a></th>
                                    <td>{{ $timeslot->venue->name }}</td>
                                    <td>
                                        @if($timeslot->status == 0)
                                        <span class="badge badge-info">Pending</span>
                                        @elseif($timeslot->status == 1)
                                        <span class="badge badge-success">Available</span>
                                        @else
                                        <span class="badge badge-danger">Occupied</span>
                                        @endif
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>       
    </div>
@endsection