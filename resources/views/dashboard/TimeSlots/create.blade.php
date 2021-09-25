@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'Create Time Slot | KELA Administrator')
@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="fluid-container">
        <div class="row justify-content-center">
            <div class="col-md-12">                  
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Create New Time Slot') }}</h2>
                    </div>
                    <div class="col-auto">
                        
                        <a href="{{route('admin.timeslots.index')}}" class="btn btn-primary" style="color:white">
                            <span style="color:white"></span> {{ __('Back') }}
                        </a>
                    
                    </div>
                </div>                  
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.timeslots.index')}}">{{ __('Time Slots') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Create New Time Slot') }}</li>
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
                    @if($venues->isEmpty())
                        <h5 class="text-center">You can't create timeslot right now. Please create venue first.</h5>
                    @endif
                    @if($venues->isNotEmpty())
                    <form action={{route('admin.timeslots.store')}} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="starttime">Start Time <span class="require"></label>
                            <input id="timepicker1" placeholder="Select start time" class="form-control" name="starttime">
                        </div>

                        <div class="form-group">
                            <label for="endtime">End Time <span class="require"></label>
                            <input id="timepicker2" placeholder="Select end time" class="form-control" name="endtime">
                        </div>

                        <div class="form-group">
                            <label for="venues">Venues</label>
                            <select class="form-control selectpicker" data-style="btn-danger" id="venue_id"
                                name="venue_id">
                                @foreach ($venues as $venue)
                                <option value="{{$venue->id}}">{{$venue->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-lg float-right">
                            <i class='bx bx-list-plus' ></i> Save
                            </button>
                        </div>
        
                    </form>
                    @endif
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