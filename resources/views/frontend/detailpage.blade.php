@extends('dashboard.bootstrap')
@extends('master')

<link rel="stylesheet" href="{{asset('css/detailpage.css')}}">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">

@section('titlepage')

<title>{{ $venue->name }} | KELA</title>

@section('content')
<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">
<section class="skrollable u-clearfix u-image u-shading u-section-1 shadow">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-sheet-1">
      <div class="d-flex justify-content-center">
        <h1 class="u-custom-font u-text u-text-body-alt-color u-text-default u-text-1">{{ $venue->name }}</h1>
      </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-2" id="sec-19bc">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-38 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">

                  <div id="carouselExampleFade" class="carousel slide carousel-fade shadow" data-ride="carousel">
                    <div class="carousel-inner" style="max-width:800px; max-height:400px !important;">
                      <div class="carousel-item active">
                        <img src="{{asset("images/".$venue->img_url)}}" class="d-block w-100" >
                      </div>

                      @if(is_array($images) && !empty($images))
                        @foreach ($images as $image)
                          <div class="carousel-item">
                            <img src="{{ url('images/'.$image) }}" class="d-block w-100">
                          </div>
                        @endforeach
                      @endif

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>

                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-22 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <div class="d-flex justify-content-center">
                    <h2 class="u-custom-font u-text u-text-custom-color-1 u-text-default u-text-1">Opening Hours</h2>
                  </div>
                  
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($timeslots as $timeslot)
                      <tr>
                        <th class="align-middle">
                          <div class="d-flex justify-content-center">
                            <h5>{{ $timeslot->starttime }} - {{ $timeslot->endtime }}</h5>
                          </div>
                        </th>
                        <th>
                        <div class="d-flex justify-content-center">
                          <a class="btn btn-danger" href="{{ route('createBooking', $timeslot->id) }}">Book</a>
                        </div> 
                        </th>
                      </tr>
                      @endforeach
                      @if ($timeslots->isEmpty())
                        <h5 class="text-center">There aren't no booking time slots yet.</h5>
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-3" id="sec-8f66">
      <div class="u-clearfix u-sheet u-valign-middle-xl u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-38 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <h1 class="u-custom-font u-text u-text-default u-text-1"> Venue Detail</h1>
                  <p class="u-align-justify u-text u-text-custom-color-3 u-text-2">{!!$venue->description!!}</p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-22 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h2 class="u-text u-text-default u-text-font u-text-3">Contact</h2>
                  <p class="u-align-left-lg u-align-left-xl u-custom-font u-text u-text-4"><span class="u-icon u-text-custom-color-1 u-icon-1"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><g><g><path d="M256,0C161.896,0,85.333,76.563,85.333,170.667c0,28.25,7.063,56.26,20.49,81.104L246.667,506.5    c1.875,3.396,5.448,5.5,9.333,5.5s7.458-2.104,9.333-5.5l140.896-254.813c13.375-24.76,20.438-52.771,20.438-81.021    C426.667,76.563,350.104,0,256,0z M256,256c-47.052,0-85.333-38.281-85.333-85.333c0-47.052,38.281-85.333,85.333-85.333    s85.333,38.281,85.333,85.333C341.333,217.719,303.052,256,256,256z"></path>
</g>
</g></svg><img></span>&nbsp;Address :
                  </p>
                  <p class="u-align-center-md u-align-center-sm u-align-center-xs u-align-left-xl u-custom-font u-text u-text-custom-color-3 u-text-5">{{ $venue->address }}</p>
                  <p class="u-align-center-md u-align-center-sm u-align-center-xs u-custom-font u-text u-text-custom-color-3 u-text-6"><a href="tel:{{ $venue->phonenumber }}" style="text-decoration: none; color:black;">{{ $venue->phonenumber }}</a></p>
                  <p class="u-custom-font u-text u-text-default u-text-7"><span class="u-icon u-icon-2"><svg class="u-svg-content" viewBox="0 0 513.64 513.64" x="0px" y="0px" style="width: 1em; height: 1em;"><g><g><path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72    c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68    c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44    l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"></path>
</g>
</g></svg><img></span>&nbsp;Phone :
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
@endsection