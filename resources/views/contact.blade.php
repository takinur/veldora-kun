@extends('layouts.app')


@section('content')
<!-- Start contain wrapp -->
<div class="section padding-bot50">
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-info text-center" role="alert">
            <strong>{{ Session::get('message') }}</strong>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger text-center" role="alert">
            <strong> Please check the errors below! </strong>
        </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <!-- Start Form -->
                <form method="post" id="mycontactform" action="{{ route('contact-form.store') }}">
                    @csrf
                    <div class="clearfix"></div>
                    <div id="success"></div>
                    <div class="row wrap-form">
                        <div class="form-group col-md-6 col-sm-6">
                            <h6>Full Name</h6>
                            <input type="text" name="name" id="name" class="form-control input-lg required"
                                placeholder="Enter your full Name..." @auth()

                                value="{{ Auth::user()->name }}"

                                @endauth>
                            @error('name')
                            <span data-for="name" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <h6>Email Address</h6>
                            <input type="email" name="email" id="email" class="form-control input-lg required"
                                placeholder="Enter your email address..." @auth()

                                value="{{ Auth::user()->email }}"

                                @endauth>
                            @error('email')
                            <span data-for="email" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <h6>Your Message</h6>
                            <textarea name="message" id="message" class="form-control input-lg required"
                                placeholder="Write something for us..." rows="9"></textarea>
                            @error('message')
                            <span data-for="message" class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <input type="submit" value="Send Message" id="submit" class="btn btn-primary btn-lg" />
                            <div class="status-progress"></div>
                        </div>
                    </div>
                </form>
                <!-- End Form -->
            </div>
            <div class="col-md-4 col-sm-5">
                <div class="contact-detail">
                    <div class="contact-sparator"></div>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-home fa-2x fa-primary"></i>
                            <h6>Our location</h6>
                            <p>
                                Arbat 20, Moscow<br /> Russia 119002
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-phone fa-2x fa-primary"></i>
                            <h6>Call center</h6>
                            <p>
                               <a href="tel:+7-910-434-6069">+7-910-434-6069</a>
                            </p>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-2x fa-primary"></i>
                            <h6>Email address</h6>
                            <p>
                                <a href="mailto:order@courierinmoscow.com">order@courierinmoscow.com</a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End contain wrapp -->

<div class="clearfix"></div>

<!-- Start google map -->
<div id="map" class="map-wrapper">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.4628253968945!2d37.59123551582837!3d55.75046188055274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54bb333800449%3A0xcbef7bf28dd287e9!2sArbat%20St%2C%2020%2C%20Moskva%2C%20Russia%2C%20119002!5e0!3m2!1sen!2sbd!4v1631969753987!5m2!1sen!2sbd" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</div>
<!-- End google map -->


@endsection
