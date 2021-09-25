@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'All Venues | KELA Administrator')
@section('content')
<div class="fluid-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Venues') }}</h2>
                </div>
                <div class="col-auto">
                    <a href="{{route('admin.venues.create')}}" class="btn btn-danger" style="color:white">
                        <span style="color:white"><i class='bx bx-plus-circle' ></i></span> {{ __('New') }}
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
                                <li class="breadcrumb-item active">{{ __('Venues') }}</li>
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
            @if(Session::has('updated'))
                <div class="alert alert-info">
                {{Session::get('updated')}}
                </div>
            @endif

            @if(Session::has('deleted'))
                <div class="alert alert-danger">
                {{Session::get('deleted')}}
                </div>
            @endif
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- table -->
                            @if($venues->isEmpty())
                                <div class="d-flex justify-content-center">
                                    <div class="text-center">
                                        <div class="py-5">
                                        <i class="bx bxs-message-square-x" style="font-size: 10rem; color:#fe2a43;"></i>
                                        </div>
                                        <h3 class="text-center" style="color:#fe2a43;">There's no records right now.</h3>
                                    </div>
                                </div>
                            @endif
                            @if($venues->isNotEmpty())
                            <div class="table-responsive">
                            <table class="table datatables" id="dataTable-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th width="150px">Image</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th width="300px">{{ __('Address') }}</th>
                                        <th>{{ __('Phone Number') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th width="120px">{{ __('Created at') }}</th>
                                        <th width="300px">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                @foreach ($venues as $venue)
                                <tbody>
                                    <tr class="text-center">
                                        <td>{{ $venue->id }}</td>
                                        <td>
                                            <img src="{{asset("images/".$venue->img_url)}}" alt="Image"
                                            class="img-responsive" width="100px">
                                        </td>
                                        <td>{{ $venue->name }}</td>
                                        <td>{!!Str::limit($venue->description, 350, ' (...)')!!}</td>
                                        <td>{!!Str::limit($venue->address, 150, ' (...)')!!}</td>
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
                                        <td>{{ $venue->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a class="btn btn-primary mb-2"
                                                href="{{ route('admin.venues.edit',$venue->id) }}"><i class='bx bx-edit' ></i> Edit</a>
                                            <a class="btn btn-info mb-2"
                                                href="{{ route('admin.venues.show',$venue->id) }}"><i class='bx bx-photo-album' ></i> Photos</a>
                                            {!! Form::open(['method' => 'DELETE','route' =>
                                            ['admin.venues.destroy', $venue->id],'style'=>'display:inline'])
                                            !!}
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
                                {!! $venues->links("pagination::bootstrap-4") !!}
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