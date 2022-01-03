<!-- Start footer -->
<footer>
    <!-- Start main footer -->
    <div class="main-footer padding-bot30">
        <div class="container">
            <div class="row">
                <div class="col-md-3 widget-footer">
                    <h5 class="title">About Us</h5>
                    <p>
                        CourierinMoscow.com is a Moscow based company that offers unique and faster courier and
                        messenger services to meet up with your urgency within the shortest possible time.
                    </p>
                    <div class="footer-network">
                        <a href="#"><i class="fa fa-facebook icon-circle"></i></a>
                        <a href="#"><i class="fa fa-twitter icon-circle"></i></a>
                        <a href="#"><i class="fa fa-linkedin icon-circle"></i></a>
                        <a href="#"><i class="fa fa-dribbble icon-circle"></i></a>
                        <a href="#"><i class="fa fa-instagram icon-circle"></i></a>
                    </div>
                </div>
                <div class="col-md-3 widget-footer">
                    <div class="row">
                        <div class="col-md-5 col-sm-6 col-xs-6">
                            <!-- Start Link -->
                            <ul class="footer-link">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('service') }}">Services</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('tracking') }}">Tracking</a></li>
                            </ul>
                            <!-- End Link -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <!-- Start Link -->
                            <ul class="footer-link">
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                <li><a href="{{ route('terms.show') }}">Term Of Service</a></li>
                                <li><a href="{{ route('policy.show') }}">Privacy Policy</a></li>
                            </ul>
                            <!-- Start Link -->
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget-footer">
                    {{-- <h5 class="title">Subscribe Now</h5>
                    <p>Hrrem volutpat per in te hinc essent mea ei pro corrumpit.</p>
                    <div class="input-group left">
                        <input type="text" class="form-control form-subscribe" placeholder="Enter Your Email">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><span class="fa fa-envelope"></span></button>
                        </span>
                    </div> --}}
                </div>
                <div class="col-md-3 widget-footer">
                    <h5 class="title">Twitter Feed</h5>
                    <div id="tweecool">
                        <a class="twitter-timeline" data-height="300" data-theme="dark" href="https://twitter.com/CourierInMoscow?ref_src=twsrc%5Etfw">Tweets by CourierInMoscow</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main footer -->

    <!-- Start sub footer -->
    <div class="subfooter">
        <p>{{ date( "Y") }} &copy; Copyright <a href="">CourierinMoscow</a> All rights Reserved.</p>
    </div>
    <!-- End sub footer -->
</footer>
<!-- End footer -->

<!-- Start to top -->
<a href="#" class="toTop">
    <i class="fa fa-chevron-up"></i>
</a>
<!-- End to top -->
