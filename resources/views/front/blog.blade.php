@extends('layouts.front')
@section('content')

<div class="clearfix"></div>
<section class="m-blog">
    <div class="container container-m">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="heading">
                    <h2>News <span>/ Blogs</span></h2>
                </div>
            </div>
            @foreach($blog as $list)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-box blog-grid-box">
                    <div class="blog-grid-box-img">
                        <a href="{{url('blog/'.$list->slug)}}"><img src="{{asset($list->image)}}" class="img-responsive" alt="{{$list->alt}}" /></a>
                        <div class="blog-post-date theme-bg"><span class="dtBlog">{{ $list->created_at->format('d') }}</span><span>{{ $list->created_at->format('M') }}</span></div>
                    </div>
                    <div class="blog-grid-box-content">
                        <h4><a href="{{url('blog/'.$list->slug)}}">{{$list->title}}</a></h4>
                        <div class="post-meta">
                            <span class="author"><i class="ti-user"></i><a href="#" title="Posts by admin">James</a></span>
                            <span class="author"><i class="ti-comment-alt"></i>0 Comments</span>
                        </div>
                        <p>{{substr(strip_tags($list->description), 0, 120)}}...</p>
                        <a href="{{url('blog/'.$list->slug)}}" class="theme-cl" title="Read More..">Continue...</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@stop