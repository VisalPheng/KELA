@extends('dashboard.layout')
@extends('dashboard.bootstrap')
@section('title', 'All Users | KELA Administrator')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">                  
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Users') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('user-create')
                            <a href="{{route('admin.users.create')}}" class="btn btn-success" style="color:white">
                                <span style="color:white"></span> {{ __('New') }}
                            </a>
                        @endcan
                    </div>
                </div>                  
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Users') }}</li>
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
                                <div class="table-responsive">
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Roles') }}</th>
                                                <th>{{ __('Created at') }}</th>
                                                <th width="280px">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        @foreach ($data as $key => $user)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if(!empty($user->getRoleNames()))
                                                            @foreach($user->getRoleNames() as $v)
                                                            <label class="badge badge-success">{{ $v }}</label>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <a class="btn btn-secondary mb-2" href="{{ route('admin.users.show',$user->id) }}">{{ __('Show') }}</a>
                                                        @can('user-edit')
                                                            <a class="btn btn-primary mb-2" href="{{ route('admin.users.edit',$user->id) }}">{{ __('Edit') }}</a>
                                                        @endcan
                                                        @can('user-delete')
                                                            {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                            <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure?')"><i class='bx bxs-trash-alt'></i> Delete</button>
                                                            {!! Form::close() !!}
                                                        @endcan
                                                     </td>
                                                </tr>                                            
                                            </tbody>
                                        @endforeach
                                    </table>
</div>
                                    <div class="d-flex justify-content-center">
                                {!! $data->links("pagination::bootstrap-4") !!}
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