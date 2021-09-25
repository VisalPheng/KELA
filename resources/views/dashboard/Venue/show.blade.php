@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'View Photos | KELA Administrator')
@section('content')
<div class="fluid-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Venues') }}</h2>
                </div>
                <div class="col-auto">
                    <a href="{{route('admin.venues.index')}}" class="btn btn-primary" style="color:white">
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
                                <li class="breadcrumb-item"><a href="{{route('admin.venues.index')}}">{{
                                    __('Venues') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Photos') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- table -->
                            <table class="table datatables" id="dataTable-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $venue->id }}</td>
                                        <td>
                                            @if(is_array($images) && !empty($images))
                                                @foreach ($images as $image)
                                                    <div style="padding: 5px;">
                                                    <img src="{{ url('images/'.$image) }}" width="400px"/>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <!-- <img src="{{asset("images/".$venue->img_url)}}" alt="Image"
                                            class="img-responsive" width="100px"> -->
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                </div> <!-- .col-md-12 -->
            </div> <!-- end section row my-4 -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->

@endsection