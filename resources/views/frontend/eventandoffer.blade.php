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
<link rel="stylesheet" href="{{asset('css/eventandoffer.css')}}">

@section('titlepage')

<title>{{ $eventandoffer->name }} | KELA</title>

@section('content')

<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">
    <section class="u-clearfix u-image u-shading u-section-1 shadow">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="d-flex justify-content-center">
                <h1 class="u-custom-font u-text u-text-default u-text-white u-text-1 text-center">{{ $eventandoffer->name }}</h1>
            </div>
        </div>
    </section>
    <div class="u-layout">
        <div class="u-layout-row">
            <div class="container py-5">
                <img src="{{asset("images/".$eventandoffer->img_url)}}" class="img-fluid shadow" alt="...">
            </div>
            <div class="container pb-5">
                <p>{!! $eventandoffer->description !!}</p>
            </div>
        </div>
    </div>
</body>
@endsection