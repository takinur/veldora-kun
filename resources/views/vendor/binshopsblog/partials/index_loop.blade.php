{{--Used on the index page (so shows a small summary--}}


<div class="article-post">
    <div class="row">
        <div class="col-md-4">
            <div class="thumb">
                <?=$post->image_tag("thumbnail", true, ''); ?>
            </div>
        </div>
        <div class="col-md-8">
            <h5 class="title">
                <a href="{{$post->url($locale)}}">{{$post->title}}</a>
            </h5>
            <div class="meta-post">
                <ul>
                    <li><a href="#"><i class="fa fa-calendar"></i> {{date('d M Y ', strtotime($post->post->posted_at))}}</a></li>
                    <li><a href="#"><i class="fa fa-pencil"></i> {{$post->post->author->name}} </a></li>
                </ul>
            </div>
            <p>
                <p>{!! mb_strimwidth($post->post_body_output(), 0, 300, "...") !!}</p>

            </p>
            <a href="{{$post->url($locale)}}" class="readmore">Read more <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>
<!-- End Article -->

