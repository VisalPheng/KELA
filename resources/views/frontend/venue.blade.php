@extends('dashboard.bootstrap')
@extends('master')

<link rel="stylesheet" href="{{asset('css/Venue.css')}}">
<link rel="stylesheet" href="{{asset('css/searchbar.css')}}">
<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

@section('titlepage')

<title>Home | KELA</title>

@section('content')

<body class="u-body u-overlap u-overlap-contrast u-overlap-transparent">
  <section class="u-clearfix u-image u-section-1 shadow" id="sec-e3b4" data-image-width="2201" data-image-height="1467">
    <div class="
          u-clearfix
          u-sheet
          u-valign-middle-lg
          u-valign-middle-md
          u-valign-middle-xl
          u-sheet-1
        ">
      <div class="u-container-style u-expanded-width u-group u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <h1 class="
                u-align-center u-text u-text-body-alt-color u-title u-text-1
              ">
            Find your favorite sport venues
          </h1>
          <div class="s003">
            <form action={{ route('search') }}>
              <div class="inner-form">
                <div class="input-field second-wrap">
                  <input name="query" type="search" placeholder="Enter location that you wanna search :)" required/>
                </div>
                <div class="input-field third-wrap">
                  <button class="btn-search" type="submit">
                    <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                  </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="u-clearfix u-section-2" id="sec-171c">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
        
        <div class="u-container-style u-expanded-width u-group u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h2 class="u-text u-text-1">Explore venues</h2>
            <a href="{{ route('home.allvenues') }}" class="u-border-none u-btn u-btn-round u-button-style u-custom-color-4 u-hover-custom-color-1 u-radius-50 u-btn-1">More</a>
          </div>
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
            <h4 class="text-center pt-5" style="color:#fe2a43;">There aren't any venues available yet.</h4>
          @endif
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="col">
          <div class="row">
            <div class="col text-center">
              <h1 style="color: #fe2a43; font-weight: bold;">Events and Offers</h1>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="container">
                <section class="pt-3">
                  <div class="container">
                    @if ($eventsandoffers->isEmpty())
                    <h4 class="text-center pt-5" style="color:#fe2a43;">There aren't any events and offers available yet.</h4>
                    @endif
                    @if ($eventsandoffers->isNotEmpty())
                    <div class="row">
                        <div class="col-12 text-right">
                            <a class="btn btn-outline-danger btn-lg mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                              <i class='bx bx-left-arrow' ></i>
                            </a>
                            <a class="btn btn-outline-danger btn-lg mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                              <i class='bx bx-right-arrow' ></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @foreach($eventsandoffers->shuffle() as $item)
                                            <div class="col-md-4 mb-3">
                                                <div class="card h-100 border border-danger shadow">
                                                    <img style="object-fit: cover; width: 100%; height:20vh;" class="img-fluid" alt="100%x280" src="{{asset("images/".$item->img_url)}}">
                                                    <div class="card-body">
                                                        <a href="{{ route('home.eventandoffer', $item->id) }}" class="card-title" style="font-weight: bold; font-size: 1.3rem; color: Black; text-decoration: none;">{{ $item->name }}</a>
                                                        <p class="card-text">{!!Str::limit($item->description, 150, ' ( ... )')!!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                          @foreach($eventsandoffers->shuffle() as $item)
                                          <div class="col-md-4 mb-3">
                                              <div class="card h-100 border border-danger shadow">
                                                  <img style="object-fit: cover; width: 100%; height:20vh;" class="img-fluid" alt="100%x280" src="{{asset("images/".$item->img_url)}}">
                                                  <div class="card-body">
                                                    <a href="{{ route('home.eventandoffer', $item->id) }}" class="card-title" style="font-weight: bold; font-size: 1.3rem; color: Black; text-decoration: none;">{{ $item->name }}</a>
                                                      <p class="card-text">{!!Str::limit($item->description, 150, ' ( ... )')!!}</p>
                                                  </div>
                                              </div>
                                          </div>
                                          @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                </section>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="container py-5">
                <h1 class="text-center py-4" style="color: #fe2a43; font-weight: bold;">Our Partners</h1>
                @if ($partners->isEmpty())
                <h4 class="text-center pt-5" style="color:#fe2a43;">There aren't any partners available yet.</h4>
                @endif
                @if ($partners->isNotEmpty())
                <ul class="partner-group">
                  @foreach($partners as $partner)
                  <li class="partner-group-item"><img src="{{asset("images/".$partner->img_url)}}"></li>
                  @endforeach
                </ul>
                @endif
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="container">
                <section class="pt-3 pb-5">
                  <div class="container pb-5">
                    <div class="row">
                      <!-- ***** FAQ Start ***** -->
                      <div class="col-md-12">
                          <div class="faq-title text-center pb-3">
                              <h2 style="color: #fe2a43; font-weight: bold;">Frequently Asked Questions ( F.A.Qs )</h2>
                          </div>
                      </div>
                      <div class="col-md-12">
                        @if ($faqs->isEmpty())
                          <h4 class="text-center pt-5" style="color:#fe2a43;">There aren't any f.a.qs available yet.</h4>
                        @endif
                        @if ($faqs->isNotEmpty())
                          <div class="faq" id="accordion">
                            @foreach($faqs as $faq)
                              <div class="card">
                                  <div class="card-header" id="faqHeading-{{ $faq->id }}">
                                      <div class="mb-0">
                                          <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-{{ $faq->id }}" data-aria-expanded="true" data-aria-controls="faqCollapse-{{ $faq->id }}">
                                              <span><i class='bx bxs-right-arrow badge'></i></span>{{ $faq->name }}
                                          </h5>
                                      </div>
                                  </div>
                                  <div id="faqCollapse-{{ $faq->id }}" class="collapse" aria-labelledby="faqHeading-{{ $faq->id }}" data-parent="#accordion">
                                      <div class="card-body">
                                          <p>{!! $faq->description !!}</p>
                                      </div>
                                  </div>
                              </div>
                            @endforeach
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                </section>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col pb-5">
              <div class="container py-5">
                <div class="card col-md-8 offset-md-2 shadow border border-danger">
                  <div class="card-body">
                    <h2 class="text-center py-4" style="color: #fe2a43; font-weight: bold;">Contact Us</h2>
                    <form action={{route('home.storemessage')}} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg border border-danger" name="name" placeholder="Enter your name" required/>
                        </div>

                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg border border-danger" name="email" placeholder="Enter your email" required/>
                        </div>

                        <div class="form-group">
                          <input type="tel" class="form-control form-control-lg border border-danger" name="phonenumber" placeholder="Enter your phone number" required/>
                        </div>

                        <div class="form-group">
                          <textarea rows="5" name="message" class="form-control form-control-lg border border-danger" placeholder="Enter your description" required></textarea>
                        </div>

                        <div class="form-group py-4">
                            <button type="submit" class="btn btn-danger btn-lg btn-block">
                                Message
                            </button>
                        </div>
        
                    </form>
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