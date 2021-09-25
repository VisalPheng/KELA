@extends('venuedashboard.layout')
@extends('venuedashboard.bootstrap')
@section('title', 'Profile | KELA Venue Owner')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">                  
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Profile') }}</h2>
                    </div>
                </div>                  
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('venuedashboard.dashboard')}}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Profile') }}</li>
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
                    <p>{{ $message }}</p>
                    </div>
                @endif

                @if(Session::has('deleted'))
                    <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row my-4">
                    @foreach ($profile as $user)
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" style="padding-top: 2rem; padding-bottom: 2rem;">
                                <div class="card shadow border border-info">
                                    <div class="card-header text-white bg-info font-weight-bold">Account Overview</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                  <tr>
                                                    <th>Name:</th>
                                                    <td>{{ $user->name }}</td>
                                                  </tr>
                                                  <tr>
                                                    <th>Email:</th>
                                                    <td>{{ $user->email }}</td>
                                                  </tr>
                                                  <tr>
                                                    <th>Member Since:</th>
                                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8" style="padding-top: 2rem; padding-bottom: 2rem;">
                                <div class="card shadow border border-danger">
                                    <div class="card-header text-white bg-danger font-weight-bold">Edit Profile</div>
                                    <div class="card-body">
                                        <div class="container">
                                            <form action="{{ route('venue.profile.update', $user->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name<span class="require"></label>
                                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"</input>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email<span class="require"></label>
                                                    <input type="text" class="form-control" name="email" value="{{ $user->email }}"></input>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-danger">
                                                    Update Profile
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" style="padding-top: 2rem; padding-bottom: 2rem;">
                                <div class="card shadow border border-warning">
                                    <div class="card-header text-white bg-warning font-weight-bold">Edit Password</div>
                                    <div class="card-body">
                                        <div class="container">
                                            <form action="{{ route('venue.profile.updatePassword', $user->id) }}" method="POST">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="currentpassword">Current Password<span class="require"></label>
                                                    <input type="password" class="form-control" name="currentpassword" required></input>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password<span class="require"></label>
                                                    <input type="password" class="form-control" name="password" required></input>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Confirmed Password<span class="require"></label>
                                                    <input type="password" class="form-control" name="confirm_password" required></input>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-warning text-white">
                                                    Change Password
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> <!-- end section row my-4 -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->      
@endsection