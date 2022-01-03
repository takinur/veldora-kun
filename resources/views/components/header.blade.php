
<!-- Strat Top Menu -->
<div class="top-menu">
    <div class="container">
        <ul class="menu-link">
            @guest

            <a class="btn btn-default btn-bordered"  href="{{ route('login') }}">{{ __('Login') }}</a>


            @if (Route::has('register'))
                <a class="btn btn-blue" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else

            <a href="/dashboard" class="btn ml-4"> <i class="fa fa-user"></i> {{ Auth::user()->name}} </a>

            <a href="{{ route('logout') }}"
                class="btn btn-red"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
            @endguest
        </ul>
        <ul class="menu-icon">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
    </div>
</div>
<!-- End Top Menu -->

<!-- Start Navigation -->
<nav class="navbar navbar-default navbar-sticky bootsnav">

    <div class="container">

        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/brand/logo-black.png') }}" class="logo" alt=""></a>
        </div>
        <!-- End Header Navigation -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>

                <li class="{{ request()->is('service') ? 'active' : '' }}"><a href="{{ route('service') }}">Services</a></li>

                {{-- <li class="{{ request()->is('booking') ? 'active' : '' }}"><a href="{{ '/booking' }}">Booking</a></li> --}}

                <li class="{{ request()->is('tracking') ? 'active' : '' }}"><a href="{{ '/tracking' }}">Tracking</a></li>

                <li class="{{ request()->is('blog*') ? 'active' : '' }}"><a href="{{ '/blog' }}">Blog</a></li>

                <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About Us</a></li>

                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact US</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<!-- End Navigation -->
