@extends('layouts.app')

@section('content')

<!-- Start page title -->
<div class="section page-title">
    <div class="" id="videoBG">
        <video autoplay muted loop>
            <source src="{{ asset('images/traffic_004.mp4') }}" type="video/mp4" />
        </video>
    </div>
    <div class="container content-parallax">
        <h3 class="title">About <span>Us</span></h3>
        <span>Express Delievery</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Components</a></li>
            <li class="active">About</li>
        </ol>
    </div>
    <div class="triangle" data-height="80" data-color-bottom="#ffffff" data-color-top="transparent"></div>
</div>
<!-- eND page title -->

<div class="clearfix"></div>

<!-- Start Section -->
<div class="section paddingbot-clear">
    <div class="container">
        <!-- Start Heading -->
        <div class="heading marginbot30">
            <h2 class="title">
                <span>Who we are</span>
                Courier in Moscow
            </h2>
        </div>
        <!-- End Heading -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <p class="md:font-sans text-justify text-2xl leading-relaxed">
                    CourierinMoscow.com is a Moscow based company that offers unique and faster courier and messenger
                    services to meet up with your urgency within the shortest possible time.
                    <br>
                    At CourierinMoscow.com, we provide a lightning speed courier and messenger services to deliver your
                    packages around Moscow and her sub-hubs . We offer fast and swift services, we are first to reckon
                    with and second to none as our deliveries take at most two to three hours.
                    <br>
                    This is possible because we are always ready and available to pick your packages and ready to be
                    delivered swiftly through our unconventional and peculiar modes of service delivery that guarantees
                    an immediate pick-up with a lightning travel speed that gets your packages and messages delivered
                    within two to three hours or less to their destinations.
                    <br>
                    Also, our aim is to make our fast services readily available to meet your demands as we ensure the
                    safety of your deliverables. Our team upholds accuracy and are equipped with a state of the art
                    technological system for real time tracking, thus, we can assure you of a premium courier and
                    messenger services at all times.
                    <br>
                    More so, our mission at CourierinMoscow.com is to connect our clients and their recipients with the
                    best and fastest courier services through our special and distinctive modes of transmission.
                    <br>
                    Conclusively, at CourierinMoscow.com, we value and cherish the satisfaction of our clients and we
                    make them our top priority. Also, we are committed to continually serve you beyond the best you
                    could imagine because we are faster, better and affordable.

                </p>
                <img src="images/bike-image.png" alt="" class="img-responsive img-center">
            </div>
        </div>
    </div>
    <div class="triangle margin-mintop85" style="margin-top: 15px" data-height="115" data-color-bottom="#f0f2f5" data-color-top="transparent">
    </div>
</div>
<!-- End Section -->
<div class="clearfix"></div>

<!-- Start Section -->
<div class="section gray padding-bot30">
    <div class="container">
        <!-- Start Heading -->
        <div class="heading marginbot35">
            <h2 class="title">
                <span>Met our team</span>
                Moscow Courier
            </h2>
        </div>
        <!-- End Heading -->
        <!-- Start Content Slider -->
        <div class="wrap-slide">
            <div id="slide2" class="content-slide team-slide">
                <div class="item">
                    <!-- Start Team 01 -->
                    <div class="team-item">
                        <div class="thumb">
                            <img src="{{ asset('images/people/team/img01.jpg') }}" alt="">
                            <div class="option">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>

                                </ul>
                            </div>
                        </div>
                        <h5 class="name"><a href="#">Jaka tarub</a></h5>
                        <a href="#">@jack_tarub</a>
                    </div>
                    <!-- End Team 01 -->
                </div>
                <div class="item">
                    <!-- Start Team 02 -->
                    <div class="team-item">
                        <div class="thumb">
                            <img src="{{ asset('images/people/team/img02.jpg') }}" alt="">
                            <div class="option">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="name"><a href="#">Jaka Sembung</a></h5>
                        <a href="#">@jaka_sembung</a>
                    </div>
                    <!-- End Team 02 -->
                </div>

                <div class="item">
                    <!-- Start Team 04 -->
                    <div class="team-item">
                        <div class="thumb">
                            <img src="{{ asset('images/people/team/img04.jpg') }}" alt="">
                            <div class="option">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="name"><a href="#">Jang Kodir</a></h5>
                        <a href="#">@jang_kodir</a>
                    </div>
                    <!-- End Team 04 -->
                </div>
                <div class="item">
                    <!-- Start Team 04 -->
                    <div class="team-item">
                        <div class="thumb">
                            <img src="{{ asset('images/people/team/img05.jpg') }}" alt="">
                            <div class="option">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="name"><a href="#">John Diablo</a></h5>
                        <a href="#">@jdiablo</a>
                    </div>
                    <!-- End Team 04 -->
                </div>
            </div>
        </div>
        <!-- End Content Slider -->
    </div>
</div>
<!-- End Section -->

<div class="clearfix"></div>

<!-- Start Section -->
<div class="section paddingtop-clear bg-primary">
    <div class="triangle marginbot60" data-height="85" data-color-bottom="transparent" data-color-top="#f0f2f5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Get the best courier and messenger solution for you!</h5>
                <p>Has any questions?</p>
                <a class="btn btn-icon" href="{{ Route('contact') }}">Get in touch with us <i class="fa fa-send-o"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- End Section -->

<div class="clearfix"></div>




@endsection

@section('scripts')
@parent
<style>
    #videoBG {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-position: 0 0;
        background-repeat: no-repeat;
        display: flex;

    }

    #videoBG video {
        width: 100%;
        height: 100%;
        position: absolute;
        object-fit: fill;
        z-index: 0;
    }
</style>

@endsection
