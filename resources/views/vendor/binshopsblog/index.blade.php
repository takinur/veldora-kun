@extends("layouts.app",['title'=>$title])
{{--
@section('blog-custom-css')
    <link type="text/css" href="{{ asset('binshops-blog.css') }}" rel="stylesheet">
@endsection --}}

@section("content")
<!-- Start page title -->
<div class="section page-title">
    <div class="parallax" data-background="images/bg/page-header.jpg" data-jarallax='{"speed": 0.7}'></div>
    <div class="container content-parallax">
        <h3 class="title">Blog <span>Page</span></h3>
        <span>Blog Right Sidebar</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
            <li class="active">Right Sidebar</li>
        </ol>
    </div>
    <div class="triangle" data-height="85" data-color-bottom="#ffffff" data-color-top="transparent"></div>
</div>
<!-- End page title -->

<div class="clearfix"></div>

<!-- Start contain wrapp -->
<div class="section blog-page">
    <div class="container">
        <div class="row grid-columns">
            <div class="col-md-8 col-sm-7 main-post">
                <!-- Start Article -->
                @forelse($posts as $post)
                @include("binshopsblog::partials.index_loop")
                @empty
                <div class="col-md-12">
                    <div class='alert alert-danger'>No posts!</div>
                </div>
                @endforelse


                {{-- <!-- Start Pagination -->
                <nav>
                    <ul class="pagination pagination-lg marginbot-clear">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination --> --}}
            </div>
            <!-- Start Sidebar -->
            <div class="col-md-4 col-sm-5 sidebar">
                <div class="aside">
                    <!-- Start Widget -->
                    <div class="widget">
                        <h5 class="title">Populat Post</h5>
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

                    <!-- Start widget -->
                    <div class="widget">
                        <h5 class="title">Categories</h5>
                        <ul class="cat">
                            @foreach(\BinshopsBlog\Models\BinshopsCategory::with('categoryTranslations')->limit(20)->get()
                            as
                            $category)
                            @foreach ($category->categoryTranslations as $dd )
                            <li><i class="fa fa-edit"></i> {{ $dd->category_name}}</a> </li>
                            @endforeach

                            @endforeach
                        </ul>
                    </div>
                    <!-- End widget -->

                    <!-- Start widget -->
                    <div class="widget">
                        <h5 class="title">Follow us</h5>
                        <a href="#" class="btn btn-facebook btn-icon btn-block">Facebook <i
                                class="fa fa-facebook"></i></a>
                        <a href="#" class="btn btn-twitter btn-icon btn-block">Twitter <i class="fa fa-twitter"></i></a>
                    </div>
                    <!-- End widget -->
                </div>
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
</div>
<!-- End contain wrapp -->


@endsection
