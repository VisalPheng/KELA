@extends('master')
@section('title', 'Sign Up')

<link rel="stylesheet" href="{{asset('css/Sign-Up.css')}}">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

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
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <div
                            class="u-align-center-sm u-align-center-xs u-container-style u-layout-cell u-shape-rectangle u-size-36 u-white u-layout-cell-2">
                            <div class="u-container-layout u-valign-top-sm u-valign-top-xs u-container-layout-2">
                                <div class="verification-text" style="padding-top: 150px;">
                                    <h3
                                    class="u-align-center-lg u-align-center-md u-align-center-xl u-text u-text-default u-text-2">
                                    A verfication link has been sent to your email address
                                </h3>
                                <h5 style="color: #4f4f4f;"><br>Please click on the link that has just been sent to your email account to verify your email and continue the registration process.</h5>
                                <h5 class="text-center"><br>You will redirect in 10 seconds.</h5>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
        setTimeout(function () {
            window.location.replace('{{ route('home.venue') }}');
        }, 10000);
  </script>
</body>

@endsection