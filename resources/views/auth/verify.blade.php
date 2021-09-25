@extends('master')
@section('title', 'Login')

<link rel="stylesheet" href="{{asset('css/Login.css')}}">

@section('titlepage')

<title>Verify | KELA</title>

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
                                <div class="verification-text" style="padding-top: 80px;">
                                    <h3
                                    class="text-center" style="font-size: 2.5rem;">
                                    Verification
                                </h3>
                                <div class="u-form u-login-control u-form-1">
                                    <div class="card-body">
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif
                    
                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                        </form>
                                    </div>
                            </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

@endsection