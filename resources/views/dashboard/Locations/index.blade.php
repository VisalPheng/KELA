@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'All Locations | KELA Administrator')
@section('content')
<div class="fluid-container">
        <div class="row justify-content-center">
            <div class="col-md-12">                  
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Locations') }}</h2>
                    </div>
                    <div class="col-auto">
                            <a href="{{route('admin.locations.create')}}" class="btn btn-danger" style="color:white">
                                <span style="color:white"><i class='bx bx-plus-circle' ></i></span> {{ __('New') }}
                            </a>
                    </div>
                </div>                  
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Locations') }}</li>
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
                                @if($locations->isEmpty())
                                <div class="d-flex justify-content-center">
                                    <div class="text-center">
                                        <div class="py-5">
                                        <i class="bx bxs-message-square-x" style="font-size: 10rem; color:#fe2a43;"></i>
                                        </div>
                                        <h3 class="text-center" style="color:#fe2a43;">There's no records right now.</h3>
                                    </div>
                                </div>
                                @endif
                                @if($locations->isNotEmpty())
                                <div class="table-responsive">
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Created at') }}</th>
                                                <th width="280px">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        @foreach ($locations as $location)
                                            <tbody>
                                                <tr class="text-center">
                                                    <td>{{ $location->id }}</td>
                                                    <td>{{ $location->name }}</td>
                                                    <td>{{ $location->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                            <a class="btn btn-primary mb-2" href="{{ route('admin.locations.edit',$location->id) }}"><i class='bx bx-edit' ></i> {{ __('Edit') }}</a>
                                                            {!! Form::open(['method' => 'DELETE','route' => ['admin.locations.destroy', $location->id],'style'=>'display:inline']) !!}
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
                                {!! $locations->links("pagination::bootstrap-4") !!}
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