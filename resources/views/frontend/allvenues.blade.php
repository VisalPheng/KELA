@extends('dashboard.bootstrap')
@extends('master')

<link rel="stylesheet" href="{{asset('css/allvenues.css')}}">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">

@section('titlepage')

<title>All Venues | KELA</title>

@section('content')

<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">
<section class="u-clearfix u-image u-shading u-section-1 shadow">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <div class="d-flex justify-content-center">
      <h1 class="u-custom-font u-text u-text-default u-text-white u-text-1">Explore All Venues</h1>
      </div>
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-171c">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">

        <div class="u-container-style u-expanded-width u-group u-group-1">
          @if ($alllocations->isNotEmpty())
          <div class="u-container-layout u-container-layout-1">
            <h3 style="font-weight: 600;">Locations</h3>
            <ul class="location-group">
              @foreach($alllocations as $location)
              <li class="location-group-item"><a href="{{ route('home.sortLocation', $location->id) }}">{{$location->name}}</a></li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>

        <div class="u-expanded-width u-list u-list-1">
        @if ($allvenues->isNotEmpty())
          <div class="u-repeater u-repeater-1">
            @foreach ($allvenues as $venue)
            <div class="u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-top-xl u-container-layout-2">
                <img src="{{asset("images/".$venue->img_url)}}" alt="" class="u-expanded-width-lg u-expanded-width-md u-expanded-width-xl u-image u-image-round u-radius-10 u-image-1">
                <div class="u-align-center u-container-style u-group u-radius-10 u-shape-round u-white u-group-2">
                  <div class="u-container-layout u-valign-middle u-container-layout-3">
                    <h6 class="u-custom-font u-text u-text-custom-color-4 u-text-2">
                      <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-custom-color-4 u-btn-2" href="{{ route('home.detailpage', $venue->id) }}">{{$venue->name}}</a>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          @if ($allvenues->isEmpty())
            <h2 class="text-center pb-5" style="color:#fe2a43;">There aren't any venues available yet.</h2>
          @endif
        </div>
      </div>
    </section>
    <section>
    </section>
  </body>
@endsection