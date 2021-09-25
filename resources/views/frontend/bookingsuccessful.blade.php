@extends('dashboard.bootstrap')
@extends('master')

<link rel="stylesheet" href="{{asset('css/booking.css')}}">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

@section('titlepage')

<title>Booking | KELA</title>

@section('content')
<section class="u-clearfix u-section-1" id="sec-6963">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
              <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="text-center py-5">
                        <div class="py-5">
                        <i class="bx bxs-check-circle" style="font-size: 10rem; color:#fe2a43;"></i>
                        </div>
                        <h3>You successfully created your booking !!! <br> Please wait and check your email for the confimation !</h3>
                        <h5><br>You will redirect in 5 seconds.</h5>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <script>
        setTimeout(function () {
            window.location.replace('{{ route('home.mybooking') }}');
        }, 5000);
  </script>
@endsection