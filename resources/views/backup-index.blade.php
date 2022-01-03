@extends('layouts.app')


@section('content')

<style>
    #videoBG {
        position: absolute !important;
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
        display: block;
        z-index: -100;

    }

    #videoBG video {
        width: 100%;
        height: 100%;
        position: absolute;
        object-fit: cover;
        z-index: 0;
    }

    #homeWrapper {
        position: relative;
        z-index: 1;
        margin-bottom: -8px;
        color: #fff;
    }

    @media only screen and (max-width: 600px) {
        #videoBG {
            position: absolute !important;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 40% !important;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-position: 0 0;
            background-repeat: no-repeat;
            display: block;
            z-index: -100;

        }

        #videoBG video {
            width: 100%;
            height: 100%;
            position: absolute;
            object-fit: cover;

        }

        #BGtitle {
            padding: 5px;
            margin: 0px;
        }

    }

    #video-bg{
            width: 100%;
            height: 100%;
            position: absolute;
            object-fit: cover;

        }

    /* position: absolute !important;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    height: 100%;
    z-index: -1;
} */


</style>
<div class="clearfix"></div>

<header class="relative flex items-center justify-center h-screen mb-12 overflow-hidden">
    <div
      class="relative z-30 mr-3 text-2xl bg-transparent bg-opacity-50 rounded-xl w-full"
    >

    <div class="float-left" id="BGtitle">
        <p class="font-bold text-white ml-7 text-8xl">Courier in<span  class="text-red-500"> Moscow </span>
        </p>
        <p class="font-bold text-indigo-400 ml-7 text-5xl">
            We are faster, better, and cheaper
        </p>
    </div>
    <div class="float-right mt-7" >
        @livewire('new-booking')
    </div>


    </div>
    <video id="video-bg"
      autoplay
      loop
      muted
      class="absolute z-10 w-auto min-w-full min-h-full max-w-none"
    >
      <source
        src="{{ asset('images/businessmen-walking002.mp4') }}"
        type="video/mp4"
      />
      Your browser does not support the video tag.
    </video>
  </header>



<!-- Start Home -->
<div id="homeWrapper">
    <div id="videoBG" class="">
        <video autoplay muted>
            <source src="{{ asset('images/businessmen-walking002.mp4') }}" type="video/mp4" />
        </video>
    </div>
    <div class="w-full min-h-screen ">
        <div class="float-left mt-48 pl-11" id="BGtitle">
            <div class="heading-home ">
                <h1 class="title">Courier in<span> Moscow </span></h1>
                <p class="font-bold text-indigo-400">
                    We are faster, better, and cheaper
                </p>
            </div>
        </div>
        <div class="float-right mt-10 mr-8" data-aos="zoom-in-up" data-aos-once="true" data-aos-easing="ease-in-sine"
            data-aos-delay="3000" data-aos-duration="800">
            @livewire('new-booking')
        </div>
        {{-- <div class="row">
                <div class="col-md-4" style="border:2px solid red">
                    <div class="heading-home">
						<h1 class="title"><span>Moscow</span> courier</h1>
						<p>
							We are faster, better, and cheaper
						</p>
					</div>
                </div>
				<div class="col-md-8 float-right ml-4 right-0" style="border:2px solid red">
					{{-- <!-- Start Heading home -->
					<div class="heading-home">
						<h1 class="title"><span>Moscow</span> courier</h1>
						<p>
							We are faster, better, and cheaper
						</p>
					</div> --}
					<!-- End Heading home -->
                    @livewire('new-booking')
                </div>
            </div> --}}
    </div>
</div>


<div class="clearfix"></div>

<!-- Start Section -->
<div class="section dark paddingbot-clear">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <!-- Start Text Icon -->
                <div class="col-icon absolute-left">
                    <i class="fa fa-headphones fa-2x"></i>
                    <h5 class="normal">Booking courier</h5>
                    <p>
                       Book a courier without any hassle and sit back, we will handle the rest!
                    </p>
                </div>
                <!-- End Text Icon -->
            </div>
            <div class="col-sm-4">
                <!-- Start Text Icon -->
                <div class="col-icon absolute-left">
                    <i class="fa fa-briefcase fa-2x"></i>
                    <h5 class="normal">Delivery Package</h5>
                    <p>
                        We provide fast, rush and lightning fast delivery solution for your needs!
                    </p>
                </div>
                <!-- End Text Icon -->
            </div>
            <div class="col-sm-4">
                <!-- Start Text Icon -->
                <div class="col-icon absolute-left">
                    <i class="fa fa-truck fa-2x"></i>
                    <h5 class="normal">Track Booking</h5>
                    <p>
                        Booking information can be tracked at website with the tracking code!
                    </p>
                </div>
                <!-- End Text Icon -->
            </div>
        </div>
    </div>
    <div class="triangle margintop10" data-height="80" data-color-bottom="#ffffff" data-color-top="transparent"></div>
</div>
<!-- End Section -->

<div class="clearfix"></div>

<!-- Start Section -->
<div class="section paddingbot-clear">
    <div class="container">
        <!-- Start Heading -->
        <div class="heading marginbot30">
            <h2 class="title">
                <span>Who we are</span>
                Express Delivery courier
            </h2>
        </div>
        <!-- End Heading -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <p class="marginbot30">
                    CourierinMoscow.com is a Moscow based company that offers unique and faster courier and messenger
                    services to meet up with your urgency within the shortest possible time.
                    We offer fast and swift services, we are first to reckon with and second to none as our deliveries
                    take at most two to three hours.
                </p>
                <img src="{{ asset('images/moscow-office.png') }}" alt="" class="img-responsive img-center">
            </div>
        </div>
    </div>
    <div class="triangle margin-mintop85" data-height="80" data-color-bottom="#f0f2f5" data-color-top="transparent">
    </div>
</div>
<!-- End Section -->

<div class="clearfix"></div>

<!-- Start Section -->
<div class="section gray paddingbot-clear">
    <div class="container">
        <!-- Start Heading -->
        <div class="heading marginbot50">
            <h2 class="title">
                <span>What we do</span>
                Our Services Delivery
            </h2>
        </div>
        <!-- End Heading -->
        <div class="row">
            <div class="col-md-3 col-sm-6 marginbot30">
                <!-- Start Icon -->
                <div class="text-icon-border">
                    <span class="icon"><i class="fa fa-bolt"></i></span>
                    <h5 class="title">Lightning Fast</h5>
                    <p>
                        What makes our lightning fast service delivery different is that you are guaranteed that your
                        packages are to be delivered within 2 to 3 hours.
                    </p>
                </div>
                <!-- End Icon -->
            </div>
            <div class="col-md-3 col-sm-6 marginbot30">
                <!-- Start Icon -->
                <div class="text-icon-border">
                    <span class="icon"><i class="fa fa-rocket"></i></span>
                    <h5 class="title">Rush Delivery </h5>
                    <p>
                        Our rush delivery service is a fast package and it comes with an assurance that packages will be
                        delivered within 4 to 6 hours.
                    </p>
                </div>
                <!-- End Icon -->
            </div>
            <div class="col-md-3 col-sm-6 marginbot30">
                <!-- Start Icon -->
                <div class="text-icon-border">
                    <span class="icon"><i class="fa fa-hourglass-start"></i></span>
                    <h5 class="title">Fast 24 Hours</h5>
                    <p>
                        At CourierinMoscow.com, we also offer our clients the option to access our fast twenty four
                        hours services for delivery to be made within 24 hours from pick up.
                    </p>
                </div>
                <!-- End Icon -->
            </div>
            <div class="col-md-3 col-sm-6 marginbot30">
                <!-- Start Icon -->
                <div class="text-icon-border">
                    <span class="icon"><i class="fa fa-briefcase"></i></span>
                    <h5 class="title">Private Documents</h5>
                    <p>
                        CourierinMoscow.com takes extra care for your private documents delivery!
                    </p>
                </div>
                <!-- End Icon -->
            </div>

        </div>
    </div>
    {{-- <div class="triangle margintop10" data-height="80" data-color-bottom="#ffffff" data-color-top="transparent"></div> --}}
</div>
<!-- End Section -->

<div class="clearfix"></div>

<!-- Start Section -->
<div class="section paddingtop-clear paddingbot-clear">
    <div class="parallax" data-background="images/bg/bg02.jpg" data-jarallax='{"speed": 0.5}'></div>
    <div class="overlay"></div>
    {{-- <div class="triangle marginbot50" data-height="80" data-color-bottom="transparent" data-color-top="#f0f2f5"></div> --}}
    <div class="container content-parallax">
        <!-- Start Heading -->
        <div class='text-center  mt-5 mb-12'>
            <div class=" font-normal text-4xl text-red-500 ">
                Testimoni
            </div>
            <div class=" font-normal text-5xl mt-5">
                Client said about Express Delivery Courier
            </div>
        </div>
        <!-- End Heading -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <!-- Start Slide -->
                <div class="wrap-single-slide">
                    <div class="single-slide">
                        <div class="item">
                            <!-- Start Item Testimoni -->
                            <div class="item-testimoni">
                                <blockquote>
                                    I have been dealing with CourierinMoscow.com for a long time now and I can assure
                                    you that they are beyond what they said about themselves. Their services are swift
                                    and very fast. I got my package delivered in less than an hour. I recommend
                                    CourierinMoscow.com for any courier and messenger related services. To be precise,
                                    they are extremely good in what they do.
                                </blockquote>
                                <div class="author">
                                    <div class="name">
                                        Asep jebot - <a href="#">@Asep Jebot</a>
                                    </div>
                                    <img src="{{ asset('images/people/testimonal003.jpg') }}" alt="">
                                </div>
                            </div>
                            <!-- End Item Testimoni -->
                        </div>
                        <div class="item">
                            <!-- Start Item Testimoni -->
                            <div class="item-testimoni">
                                <blockquote>
                                    CourierinMoscow.com is so fast with their deliveries, I requested an express
                                    delivery and in no time, there was a dispatch runner around ready to pick my parcel
                                    ready to be delivered. I recommend them.
                                </blockquote>
                                <div class="author">
                                    <div class="name">
                                        Natalia Vodianova - <a href="#">@Natalia</a>
                                    </div>
                                    <img src="{{ asset('images/people/testimonal002.jpg') }}" alt="">
                                </div>
                            </div>
                            <!-- End Item Testimoni -->
                        </div>
                        <div class="item">
                            <!-- Start Item Testimoni -->
                            <div class="item-testimoni">
                                <blockquote>
                                    We would like to say a very big thank you to CourierinMoscow.com for their
                                    wonderful service and special thanks for always being around the corner ready to
                                    pick up. They are a bunch of smart, intelligent and wonderful people. Highly
                                    recommended.
                                </blockquote>
                                <div class="author">
                                    <div class="name">
                                        Denis Durjan - <a href="#">@Denis</a>
                                    </div>
                                    <img src="{{ asset('images/people/testimonal001.jpg') }}" alt="">
                                </div>
                            </div>
                            <!-- End Item Testimoni -->
                        </div>
                        <div class="item">
                            <!-- Start Item Testimoni -->
                            <div class="item-testimoni">
                                <blockquote>
                                    Dealing with CourierinMoscow.com, we have experienced nothing but excellent
                                    service. You need not to worry about professionalism and value at an affordable rate
                                    when it comes to CourierinMoscow.com. They make sure your package gets delivered in
                                    no time at affordable cost and they are always readily available. In fact, they have
                                    every thing you are looking for.
                                </blockquote>
                                <div class="author">
                                    <div class="name">
                                        Debi Algo - <a href="#">@Debi</a>
                                    </div>
                                    <img src="{{ asset('images/people/testimonal004.jpg') }}" alt="">
                                </div>
                            </div>
                            <!-- End Item Testimoni -->
                        </div>
                    </div>
                </div>
                <!-- End Slide -->
            </div>
        </div>
    </div>
    <div class="triangle margin-mintop20" data-height="80" data-color-bottom="#ffffff" data-color-top="transparent">
    </div>
</div>
<!-- End Section -->

<div class="clearfix"></div>

<!-- Start Section -->
<div class="section paddingbot-clear">
    <div class="container">
        <!-- Start Heading -->
        <div class="heading marginbot50">
            <h2 class="title">
                <span class=" uppercase">Pricing</span>
                Our delivery methods
            </h2>
        </div>
        <!-- End Heading -->

        <!-- component -->
        <div class="w-full bg-blue pt-8">
            <div class="flex flex-col sm:flex-row justify-center mb-6 sm:mb-0">
                <div
                    class="sm:flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg rounded-tr-none bg-gray-200 mt-4 flex flex-col">
                    <div class="p-8 text-3xl text-black font-extrabold text-center">Regular</div>
                    <div class="border-0 border-gray-400 border-t border-solid text-xl">
                        <div class="text-center border-0 border-gray-400 border-b border-solid py-4">
                            1 Day
                        </div>
                        <div class="text-center border-0 border-gray-400 border-b border-solid py-4">
                            Mail
                        </div>
                        <div class="text-center border-0 border-gray-400 border-b border-solid py-4">
                            Document
                        </div>
                        <div class="text-center border-0 border-gray-400 border-b border-solid py-4">
                            Private Document*
                        </div>
                    </div>
                    <div class="w-full text-center text-black font-bold px-8 pt-8 text-xl mt-auto">
                        $20 /KG
                    </div>
                    <div class="w-full text-left mb-8 mt-11">
                        <span class="text-indigo-400 text-lg ml-4 font-semibold">
                            *Private Document adds extra $10/KG
                        </span> <br>
                        <span class="text-indigo-400 text-lg ml-4 font-semibold">
                            *Package below 1KG is considered to be 1KG
                        </span>
                    </div>
                </div>
                <div
                    class="flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg bg-gray-200 mt-4 sm:-mt-4 shadow-lg z-30 flex flex-col">
                    <div class="w-full p-8 text-3xl text-black font-extrabold text-center">Rush</div>
                    <div class="w-full border-0 border-gray-400  border-t border-solid text-xl">
                        <div class="text-center border-0 border-gray-400  border-b border-solid py-4">
                            6 Hour
                        </div>
                        <div class="text-center border-0 border-gray-400  border-b border-solid py-4">
                            Mail
                        </div>
                        <div class="text-center border-0 border-gray-400  border-b border-solid py-4">
                            Document
                        </div>
                        <div class="text-center border-0 border-gray-400  border-b border-solid py-4">
                            Private Document*
                        </div>
                    </div>
                    <div class="w-full text-center text-black font-bold px-8 pt-8 text-xl mt-auto">
                        $35 /KG
                    </div>
                    <div class="w-full text-left mb-8 mt-11">
                        <span class="text-indigo-400 text-lg ml-4 font-semibold">
                            *Private Document adds extra $10/KG
                        </span> <br>
                        <span class="text-indigo-400 text-lg ml-4 font-semibold">
                            *Package below 1KG is considered to be 1KG
                        </span>
                    </div>
                </div>
                <div
                    class="flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg rounded-tl-none bg-gray-200 mt-4 flex flex-col">
                    <div class="p-8 text-3xl text-black font-extrabold text-center">Hot Rush</div>
                    <div class="border-0 border-gray-400  border-t border-solid text-xl">
                        <div class="text-center border-0 border-gray-400  border-b border-solid py-4">
                            2-3 Hour
                        </div>
                        <div class="text-center border-0 border-gray-400 border-b border-solid py-4">
                            Mail
                        </div>
                        <div class="text-center border-0 border-gray-400 border-b border-solid py-4">
                            Document
                        </div>
                        <div class="text-center border-0 border-gray-400 border-b border-solid py-4">
                            Private Document*
                        </div>
                    </div>
                    <div class="w-full text-center text-black font-bold px-8 pt-8 text-xl mt-auto">
                        $50 /KG
                    </div>
                    <div class="w-full text-left mb-8 mt-11">
                        <span class="text-indigo-400 text-lg ml-4 font-semibold">
                            *Private Document adds extra $10/KG
                        </span> <br>
                        <span class="text-indigo-400 text-lg ml-4 font-semibold">
                            *Package below 1KG is considered to be 1KG
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Pricing Table   -->



    </div>
    <div class="triangle margintop30" data-height="80" data-color-bottom="#f0f2f5" data-color-top="transparent"></div>
</div>
<!-- End Section -->

<div class="clearfix"></div>



<!-- Start Section -->
<div class="section">
    <div class="container">
        <!-- Start Heading -->
        <div class="heading marginbot45">
            <h2 class="title">
                <span>Our blog</span>
                Recent blog post
            </h2>
        </div>
        <!-- End Heading -->
        <div class="row grid-columns">
            <div class="col-md-8 col-sm-7 main-post">
                @forelse(\BinshopsBlog\Models\BinshopsPost::with('postTranslations')->orderByDesc('created_at')->limit(3)->get()
                as $post)
                @foreach ($post->postTranslations as $tpost )
                <div class="article-post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumb">
                                <img src="{{ asset('blog_images/') }}/{{ $tpost->image_thumbnail }}" alt=""
                                    class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5 class="title">
                                <a href="/en/blog/{{$tpost->slug}}">{{ $tpost->title }}</a>
                            </h5>
                            <div class="meta-post">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>
                                            @if ($tpost->created_at != null)
                                            {{ date_format($tpost->created_at, 'jS M Y')  }}
                                            @else
                                            Unknown
                                            @endif
                                        </a></li>
                                    <li><a href="#"><i class="fa fa-pencil"></i> {{ $tpost->author }}</a></li>
                                </ul>
                            </div>
                            <div class=" font-light text-base">{!! Str::limit($tpost->body, 100)!!}</div>
                            <a href="/en/blog/{{$tpost->slug}}" class="readmore">Read more <i
                                    class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- End Article -->
                @empty
                <div class="article-post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumb">
                                <img src="" alt="" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5 class="title">
                                <a href="">Sorry no recent Post!</a>
                            </h5>


                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <!-- Start Sidebar -->
            <div class="col-md-4 col-sm-5 sidebar">
                <div class="aside">
                    <!-- Start Widget -->
                    <div class="widget">
                        <h4 class="title">Populat Post</h4>
                        <!-- Start Popular Post -->
                        <ul class="list-post">
                            @foreach(\BinshopsBlog\Models\BinshopsPost::with('postTranslations')->inRandomOrder()->limit(5)->get()
                            as $post)

                            @foreach ($post->postTranslations as $spost )
                            <li>
                                <img src="{{ asset('blog_images') }}/{{ $spost->image_large }}" alt="">
                                <ul class="rate">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                </ul>
                                <h5 class="title-post">
                                    <a href="/en/blog/{{$spost->slug}}">{{$spost->title}}</a>
                                </h5>
                            </li>
                            @endforeach

                            @endforeach


                        </ul>

                        <!-- End Popular Post -->
                    </div>
                    <!-- End Widget -->
                </div>
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
</div>
<!-- End Section -->

<div class="clearfix"></div>

<!-- Start Section -->
<div class="section paddingtop-clear">
    <div class="parallax" data-background="images/bg/bg01.jpg" data-jarallax='{"speed": 0.5}'></div>
    <div class="overlay"></div>
    <div class="triangle marginbot60" data-height="80" data-color-bottom="transparent" data-color-top="#ffffff"></div>
    <div class="container content-parallax">
        <!-- Start Client -->
        <div class="wrap-client">
            <div class="client-slide">
                <div class="item">
                    <!-- Start Client 01 -->
                    <div class="client-item">
                        <a href="#">
                            <img src="images/client/img01.png" alt="">
                        </a>
                    </div>
                    <!-- End Client 01 -->
                </div>
                <div class="item">
                    <!-- Start Client 02 -->
                    <div class="client-item">
                        <a href="#">
                            <img src="images/client/img02.png" alt="">
                        </a>
                    </div>
                    <!-- End Client 02 -->
                </div>
                <div class="item">
                    <!-- Start Client 03 -->
                    <div class="client-item">
                        <a href="#">
                            <img src="images/client/img03.png" alt="">
                        </a>
                    </div>
                    <!-- End Client 03 -->
                </div>
                <div class="item">
                    <!-- Start Client 04 -->
                    <div class="client-item">
                        <a href="#">
                            <img src="images/client/img04.png" alt="">
                        </a>
                    </div>
                    <!-- End Client 04 -->
                </div>
                <div class="item">
                    <!-- Start Client 05 -->
                    <div class="client-item">
                        <a href="#">
                            <img src="images/client/img05.png" alt="">
                        </a>
                    </div>
                    <!-- End Client 05 -->
                </div>
            </div>
        </div>
        <!-- End Client -->
    </div>
</div>
<!-- End Section -->

<div class="clearfix"></div>


@endsection
