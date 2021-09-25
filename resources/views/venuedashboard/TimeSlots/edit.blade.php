@extends('venuedashboard.layout')
@extends('venuedashboard.bootstrap')
@section('title', 'Edit Time Slot | KELA Venue Owner')
@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<div class="fluid-container">
        <div class="row justify-content-center">
            <div class="col-md-12">                  
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Edit Time Slot') }}</h2>
                    </div>
                    <div class="col-auto">
                        
                        <a href="{{route('venuedashboard.timeslots.index')}}" class="btn btn-primary" style="color:white">
                            <span style="color:white"></span> {{ __('Back') }}
                        </a>
                    
                    </div>
                </div>                  
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('venuedashboard.dashboard')}}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('venuedashboard.timeslots.index')}}">{{ __('Time Slots') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Edit Time Slot') }}</li>
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
                    <form action="{{ route('venuedashboard.timeslots.update',$timeslot->id) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
        
                        <input type="hidden" name="id" id="id" value="{{$timeslot->id}}">
                        <div class="form-group">
                            <label for="time">Start Time<span class="require"></label>
                            <input id="timepicker1" placeholder="Select start time" class="form-control" value="{{$timeslot->starttime}}" name="starttime">
                        </div>

                        <div class="form-group">
                            <label for="time">End Time<span class="require"></label>
                            <input id="timepicker2" placeholder="Select end time" class="form-control" value="{{$timeslot->endtime}}" name="endtime">
                        </div>

                        <div class="form-group">
                        <label>Availability</label>
                            <select name="approve" class="form-control selectpicker" data-style="btn-danger">
                                <option value="1" @if($timeslot->status==1)selected @endif>Available</option>
                                <option value="2" @if($timeslot->status==2)selected @endif>Occupied</option>
                            </select>
                        </div>
                        
        
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-lg float-right">
                            <i class='bx bx-list-plus' ></i> Update
                            </button>
                        </div>
        
                    </form>
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->        
    <script>
        $('#timepicker1').timepicker({
            uiLibrary: 'bootstrap4',
            format: 'hh:MM TT',
        });
    </script>
        <script>
        $('#timepicker2').timepicker({
            uiLibrary: 'bootstrap4',
            format: 'hh:MM TT',
        });
    </script>
@endsection