@extends('dashboard.bootstrap')
@extends('master')

<link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="{{asset('css/userprofile.css')}}">

@section('titlepage')

<title>My Profile | KELA</title>

@section('content')

<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">
    <section class="u-clearfix u-image u-shading u-section-1 shadow">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="d-flex justify-content-center">
                <h1 class="u-custom-font u-text u-text-default u-text-white u-text-1">User Profile</h1>
            </div>
        </div>
    </section>
    <div class="u-layout">
        <div class="u-layout-row">
            <div class="container py-5">
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
                @foreach($profile as $user)
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
                                        <form action="{{ route('userprofile.update', $user->id) }}" method="POST">
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
                                        <form action="{{ route('userprofile.updatePassword', $user->id) }}" method="POST">
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
            </div>
        </div>
    </div>
</body>
@endsection