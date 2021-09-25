@extends('master')
@section('title', 'Login')

<link rel="stylesheet" href="{{asset('css/Login.css')}}">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">

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
                                    Log In
                                </h3>
                                <div class="u-form u-login-control u-form-1">
                                    <form action="{{ route('login') }}" method="POST"
                                        class="u-clearfix u-form-custom-backend u-form-spacing-15 u-form-vertical u-inner-form"
                                        source="custom" name="form-3" style="padding: 0px;">
                                        @csrf
                                        <div class="u-form-group u-form-name">
                                            <label for="username-5b0a" class="u-form-control-hidden u-label"></label>
                                            <input id="email" type="email" placeholder="Enter your Email" name="email"
                                                class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="u-form-group u-form-password">

                                            <label for="password-5b0a" class="u-form-control-hidden u-label"></label>
                                            <input id="password" type="password" placeholder="Enter your Password"
                                                name="password"
                                                class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle @error('password') is-invalid @enderror"
                                                required autocomplete="current-password">
                                                @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="u-form-checkbox u-form-group">

                                            <input type="checkbox" id="remember" name="remember" {{
                                                old('remember') ? 'checked' : '' }}>
                                            <label for="remember" class="u-label">{{ __('Remember Me') }}</label>


                                        </div>
                                        <div class="u-align-center u-form-group u-form-submit">
                                            <a href="#"
                                                class="u-active-custom-color-1 u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-1 u-radius-50 u-text-body-alt-color u-btn-1">Login</a>
                                            <input type="submit" value="submit" class="u-form-control-hidden">
                                        </div>
                                        <input type="hidden" value="" name="recaptchaResponse">
                                    </form>
                                </div>
                                <a href="/register"
                                    class="u-border-1 u-border-active-custom-color-3 u-border-hover-custom-color-2 u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-custom-color-1 u-btn-2">Become
                                    a KELA-er? Join Now</a>
                                <a href="/password/reset"
                                    class="u-border-1 u-border-active-custom-color-3 u-border-hover-custom-color-2 u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-custom-color-1 u-btn-3">Forgot
                                    password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

@endsection