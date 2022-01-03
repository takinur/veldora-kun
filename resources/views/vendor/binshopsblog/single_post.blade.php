@extends("layouts.app",['title'=>$post->gen_seo_title()])

{{-- @section('blog-custom-css')
    <link type="text/css" href="{{ asset('binshops-blog.css') }}" rel="stylesheet">
@endsection --}}

@section("content")

<!-- Start contain wrapp -->
<div class="section blog-page">
    <div class="container">
        <div class="row grid-columns">
            <div class="col-md-8 col-sm-7 main-post">

                @include("binshopsblog::partials.show_errors")
                @include("binshopsblog::partials.full_post_details")


            </div>
            <!-- End Sidebar -->
        </div>
    </div>
</div>









@endsection
