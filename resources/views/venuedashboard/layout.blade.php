<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>
    @yield('title')
  </title>
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <!--========== BOX ICONS ==========-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</head>

<body>

  <!--========== HEADER ==========-->
  <header class="header">
    <div class="header__container">

        <div class="header__search">
            <input type="search" placeholder="Search" class="header__input">
            <i class='bx bx-search header__icon'></i>
        </div>

        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
    </div>
</header>

<!--========== NAV ==========-->
<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a class="nav__link nav__logo">
                <span class="nav__logo-name" style="font-size: 28px;">KELA</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">
                    <h3 class="nav__subtitle">Venues Owner</h3>

                    <a href="{{ route('venuedashboard.dashboard') }}" class="nav__link">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Home</span>
                    </a>
                    <a href="{{ route('venue.profile.index') }}" class="nav__link">
                        <i class='bx bxs-user-circle nav__icon' ></i>
                        <span class="nav__name">Profile</span>
                    </a>
                    
                    <!-- <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="#" class="nav__dropdown-item">Passwords</a>
                                <a href="#" class="nav__dropdown-item">Mail</a>
                                <a href="#" class="nav__dropdown-item">Accounts</a>
                            </div>
                        </div>
                    </div> -->

                    <!-- <a href="#" class="nav__link">
                        <i class='bx bx-message-rounded nav__icon' ></i>
                        <span class="nav__name">Messages</span>
                    </a> -->
                </div>

                <div class="nav__items">
                    <h3 class="nav__subtitle">Menu</h3>

                    <a href="{{ route('venuedashboard.venues.index') }}" class="nav__link">
                        <i class='bx bx-current-location nav__icon' ></i>
                        <span class="nav__name">Venues</span>
                    </a>
                    <a href="{{ route('venuedashboard.timeslots.index') }}" class="nav__link">
                        <i class='bx bxs-time nav__icon' ></i>
                        <span class="nav__name">Time Slots</span>
                    </a>
                    <a href="{{ route('venuedashboard.booking.all') }}" class="nav__link">
                        <i class='bx bxs-bookmarks nav__icon' ></i>
                        <span class="nav__name">Booking</span>
                    </a>
<!-- 
                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-bell nav__icon' ></i>
                            <span class="nav__name">Notifications</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="#" class="nav__dropdown-item">Blocked</a>
                                <a href="#" class="nav__dropdown-item">Silenced</a>
                                <a href="#" class="nav__dropdown-item">Publish</a>
                                <a href="#" class="nav__dropdown-item">Program</a>
                            </div>
                        </div>

                    </div> -->
<!-- 
                    <a href="#" class="nav__link">
                        <i class='bx bx-bookmark nav__icon' ></i>
                        <span class="nav__name">Saved</span>
                    </a> -->
                </div>
            </div>
        </div>

        <a class="nav__link nav__logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class='bx bx-log-out nav__icon' ></i>
            <span class="nav__name">Log Out</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
    </nav>
</div>

<!--========== CONTENTS ==========-->
<main>
    <section class="dashboard_content">
        @yield('content')
    </section>
</main>

<!--========== MAIN JS ==========-->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
    $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

</html>