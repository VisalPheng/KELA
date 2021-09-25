@extends('master')
@section('title', 'Sign Up')

<link rel="stylesheet" href="{{asset('css/Sign-Up.css')}}">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">

@section('titlepage')

<title>Sign Up | KELA</title>

@section('content')

<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">

<section class="u-clearfix u-image u-section-1" id="sec-0bd1" data-image-width="2992" data-image-height="2000">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <div
        class="u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div
              class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-container-style u-image u-layout-cell u-shading u-size-24 u-image-1"
              data-image-width="4780" data-image-height="2686">
              <div class="u-container-layout u-valign-middle u-container-layout-1">
                <h2 class="u-text u-text-1">JOIN THE<br>BEST&nbsp;<br>SPORT COMMUNITY<br>IN TOWN
                </h2>
              </div>
            </div>
            <div
              class="u-align-center-sm u-align-center-xs u-container-style u-layout-cell u-shape-rectangle u-size-36 u-white u-layout-cell-2">
              <div class="u-container-layout u-valign-top-sm u-valign-top-xs u-container-layout-2">
                <h3 class="u-align-center-lg u-align-center-md u-align-center-xl u-text u-text-default u-text-2">Sign up
                </h3>
                <div class="u-form u-login-control u-form-1">
                  <form action="{{ route('register') }}" method="POST"
                    class="u-clearfix u-form-custom-backend u-form-spacing-15 u-form-vertical u-inner-form"
                    source="custom" name="form-3" style="padding: 0px;">
                    @csrf

                    <div class="u-form-group u-form-name">
                      <label for="name" class="u-form-control-hidden u-label"></label>
                      <input type="text" placeholder="Enter your Username" id="name" name="name" value="{{ old('name') }}"
                        class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle @error('name') is-invalid @enderror"
                        required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    </div>

                    <div class="u-form-group u-form-group-2">
                      <label for="email" class="u-form-control-hidden u-label"></label>
                      <input type="text" placeholder="Enter your email" id="email" name="email" value="{{ old('email') }}"
                        class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle @error('email') is-invalid @enderror" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>

                    <div class="u-form-group u-form-password">
                      <label for="password" class="u-form-control-hidden u-label"></label>
                      <input type="password" placeholder="Enter your Password" id="password" name="password"
                        class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle @error('password') is-invalid @enderror"
                        required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    </div>

                    <div class="u-form-group u-form-group-4">
                      <label for="password-confirm" class="u-form-control-hidden u-label"></label>
                      <input type="password" placeholder="Enter your Confirmed Password" id="password-confirm" name="password_confirmation"
                        class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle"
                        required autocomplete="new-password">
                    </div>

                    <div class="u-align-center u-form-group u-form-submit">
                      <a href="#"
                        class="u-active-custom-color-1 u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-1 u-radius-50 u-text-body-alt-color u-btn-1">Register</a>
                      <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>

                  </form>
                </div>
                <a href="/login"
                  class="u-border-1 u-border-active-custom-color-3 u-border-hover-custom-color-2 u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-custom-color-1 u-btn-2">Already
                  a KELA-er? Welcome back</a>
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