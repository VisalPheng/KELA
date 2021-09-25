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
<link rel="stylesheet" href="{{asset('css/searchresult.css')}}">

@section('titlepage')

<title>Search Results | KELA</title>

@section('content')

<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">
    <section class="u-clearfix u-image u-shading u-section-1 shadow">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="d-flex justify-content-center">
                <h1 class="u-custom-font u-text u-text-default u-text-white u-text-1">Search Results</h1>
            </div>
        </div>
    </section>
    <div class="u-layout">
        <div class="u-layout-row">
            <div class="container py-5">
                <p class="text-right" style="font-weight: bold;">{{ $venues->count() }} result(s) for '{{ request()->input('query') }}'</p>
                <div class="d-flex justify-content-center">
                    @if ($venues->isNotEmpty())
                    <div class="row row-cols-1 row-cols-md-2">
                        @foreach ($venues as $venue)
                        <div class="col-lg-12 py-2">
                            <div class="card mb-3 border border-danger shadow">
                                <div class="row no-gutters">
                                  <div class="col-md-6">
                                    <img href="{{ route('home.detailpage', $venue->id) }}" class="img-side" src="{{asset("images/".$venue->img_url)}}">
                                  </div>
                                  <div class="col-md-6">
                                    <div class="card-body">
                                      <a href="{{ route('home.detailpage', $venue->id) }}" style="font-size: 1.8rem; text-decoration: none; color: black; font-weight: bold;" class="card-title">{{$venue->name}}</a>
                                      <p class="card-text">
                                        <span style="font-weight: bold;">Address: </span>
                                        <span>{!!Str::limit($venue->address, 150, ' ( ... )')!!}</span>
                                      </p>
                                      <p class="card-text">
                                        <span style="font-weight: bold;">Phone Number: </span>
                                        <span>{{$venue->phonenumber}}</span>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        @endforeach
                      </div>
                    @endif
                    @if ($venues->isEmpty())
                    <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <div class="py-5">
                        <i class="bx bxs-message-alt-x" style="font-size: 10rem; color:#fe2a43;"></i>
                        </div>
                        <h3 class="text-center" style="color:#fe2a43;">No result for "{{ request()->input('query') }}"</h3>
                    </div>
                  </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
@endsection