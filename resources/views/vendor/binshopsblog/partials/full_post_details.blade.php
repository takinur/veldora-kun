<!-- Start Article -->
<div class="article-post">
    <div class="thumb">
        <?=$post->image_tag("medium", false, 'd-block mx-auto'); ?>
    </div>
    <h3 class="title">
        <a href="#">{{$post->title}}</a>
    </h3>
    <h5 class='blog_subtitle'>{{$post->subtitle}}</h5>

    <div class="meta-post">
        <ul>
            <li><a href="#"><i class="fa fa-calendar"></i> {{date('d M Y ', strtotime($post->post->posted_at))}}</a>
            </li>
            <li><a href="#"><i class="fa fa-pencil"></i> {{$post->post->author->name}} </a></li>
        </ul>

    </div>

    <p class="blog_body_content">
        {!! $post->post_body_output() !!}

    </p>
</div>
<!-- End Article -->

<!-- Start leave comments -->

<!-- End leave comments -->

<div class="divider margintop25 marginbot40"></div>

<!-- Start comments -->
<h5>Comments</h5>
<div class="media">
    <div class="media-body">
        @if(config("binshopsblog.comments.type_of_comments_to_show","built_in") !== 'disabled')
        <div class="" id='maincommentscontainer'>
            @include("binshopsblog::partials.show_comments")
        </div>

        @endif
    </div>
</div>


<!-- End comments -->
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
                        <a href="{{$spost->slug}}">{{$spost->title}}</a>
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
            <a href="#" class="btn btn-facebook btn-icon btn-block">Facebook <i class="fa fa-facebook"></i></a>
            <a href="#" class="btn btn-twitter btn-icon btn-block">Twitter <i class="fa fa-twitter"></i></a>
        </div>
        <!-- End widget -->
    </div>
