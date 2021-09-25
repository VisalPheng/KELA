@extends('venuedashboard.layout')
@extends('venuedashboard.bootstrap')
@section('title', 'All Time Slots | KELA Venue Owner')
@section('content')
<div class="fluid-container">
        <div class="row justify-content-center">
            <div class="col-md-12">                  
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Time Slots') }}</h2>
                    </div>
                    <div class="col-auto">
                            <a href="{{route('venuedashboard.timeslots.create')}}" class="btn btn-success" style="color:white">
                                <span style="color:white"></span> {{ __('New') }}
                            </a>
                    </div>
                </div>                  
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('venuedashboard.dashboard')}}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Time Slots') }}</li>
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
                                @if($alltimeslots->isEmpty())
                                <div class="d-flex justify-content-center">
                                    <div class="text-center">
                                        <div class="py-5">
                                        <i class="bx bxs-message-square-x" style="font-size: 10rem; color:#fe2a43;"></i>
                                        </div>
                                        <h3 class="text-center" style="color:#fe2a43;">There's no records right now.</h3>
                                    </div>
                                </div>
                                @endif
                                @if($alltimeslots->isNotEmpty())
                                <div class="table-responsive">
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>{{ __('Start Time') }}</th>
                                                <th>{{ __('End Time') }}</th>
                                                <th>{{ __('Created at') }}</th>
                                                <th>{{ __('Venue') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th width="280px">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        @foreach ($alltimeslots as $timeslot)
                                            <tbody>
                                                <tr class="text-center">
                                                    <td>{{ $timeslot->id }}</td>
                                                    <td>{{ $timeslot->starttime }}</td>
                                                    <td>{{ $timeslot->endtime }}</td>
                                                    <td>{{ $timeslot->created_at->format('Y-m-d') }}</td>
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
                                                    <td>
                                                            <a class="btn btn-primary mb-2" href="{{ route('venuedashboard.timeslots.edit',$timeslot->id) }}"><i class='bx bx-edit' ></i> {{ __('Edit') }}</a>
                                                            {!! Form::open(['method' => 'DELETE','route' => ['venuedashboard.timeslots.destroy', $timeslot->id],'style'=>'display:inline']) !!}
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
                                {!! $alltimeslots->links("pagination::bootstrap-4") !!}
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