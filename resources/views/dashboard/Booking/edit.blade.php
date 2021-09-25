@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'Edit Booking | KELA Administrator')
@section('content')
<div class="fluid-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Edit Booking') }}</h2>
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
                                <li class="breadcrumb-item active">{{ __('Edit Booking') }}</li>
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

                    <form action="{{ route('admin.booking.update',$booking->id) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
        
                        <input type="hidden" name="id" id="id" value="{{$booking->id}}">

                        <div class="form-group">
                        <label>Approval</label>
                            <select name="approve" class="form-control selectpicker" data-style="btn-danger">
                                <option value="1" @if($booking->status==1)selected @endif>Confirmed</option>
                                <option value="2" @if($booking->status==2)selected @endif>Rejected</option>
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
    $(customFile).ready(function () {
        bsCustomFileInput.init()
    })
</script>
@endsection