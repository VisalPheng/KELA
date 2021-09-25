@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'All Messages | KELA Administrator')
@section('content')
<div class="fluid-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Messages from Contact Us') }}</h2>
                </div>
            </div>
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{
                                        __('Dashboard') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Messages from Contact Us') }}</li>
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
                            @if($messages->isEmpty())
                            <div class="d-flex justify-content-center">
                                    <div class="text-center">
                                        <div class="py-5">
                                        <i class="bx bxs-message-square-x" style="font-size: 10rem; color:#fe2a43;"></i>
                                        </div>
                                        <h3 class="text-center" style="color:#fe2a43;">There's no records right now.</h3>
                                    </div>
                                </div>
                            @endif
                            @if($messages->isNotEmpty())
                            <div class="table-responsive">
                            <table class="table datatables" id="dataTable-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Phone Number') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Messages') }}</th>
                                        <th width="120px">{{ __('Created at') }}</th>
                                        <th width="300px">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                @foreach ($messages as $item)
                                <tbody>
                                    <tr class="text-center">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phonenumber }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{!!Str::limit($item->message, 350, ' (...)')!!}</td>
                                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE','route' =>
                                            ['admin.contactus.destroy', $item->id],'style'=>'display:inline'])
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
                                {!! $messages->links("pagination::bootstrap-4") !!}
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