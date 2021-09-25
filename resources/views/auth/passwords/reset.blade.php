@extends('master')
@section('title', 'Reset Password')

<link rel="stylesheet" href="{{asset('css/Login.css')}}">

@section('titlepage')

<title>Login | KELA</title>

@section('content')

<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">

    <section class="u-clearfix u-image u-section-1" id="sec-b838" data-image-width="2992" data-image-height="2000">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div
                class="u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gutter-0 u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-container-style u-image u-layout-cell u-shading u-size-24 u-image-1"
                            data-image-width="1600" data-image-height="899">
                            <div class="u-container-layout u-valign-middle u-container-layout-1">
                                <h2 class="u-text u-text-1">JOIN THE<br>BEST&nbsp;<br>SPORT COMMUNITY<br>IN TOWN
                                </h2>
                            </div>
                        </div>
                        <div
                            class="u-align-center-sm u-align-center-xs u-container-style u-layout-cell u-shape-rectangle u-size-36 u-white u-layout-cell-2">
                            <div class="u-container-layout u-valign-top-sm u-valign-top-xs u-container-layout-2">
                                <h3
                                    class="u-align-center-lg u-align-center-md u-align-center-xl u-text u-text-default u-text-2">
                                    Reset Password
                                </h3>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                    
                                            <input type="hidden" name="token" value="{{ $token }}">
                    
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                    
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Reset Password') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

@endsection