@extends('layouts.front')
@section('css')
    <style>
        .combo-select-dropdown input,
        .combo-select-dropdown li {padding: 0.6rem 1rem;margin: 0;}
        .combo-select-dropdown li {position: relative;font-size: 12px;}
        .combo-select-dropdown ul {list-style: none;padding: 0;}
        .combo-select-dropdown li li:hover {color: white;background-color: grey;}
        .combo-select-dropdown li li.current {color: white;background-color: pink;}
        .combo-select-dropdown li li.active {color: white;background-color: skyblue;}
        .select-list-group {position: relative;}
        .select-list-group,.select-list-group * {width: 100%;}
        .select-list-group .select-list-group-search+.select-list-group__toggle:after {
          content: "v";
          font-family: sans-serif;
          position: absolute;
          top: .6rem;
          right: .7rem;
          width: 2rem;
          padding: 0.6rem;
          text-align: center;
        }
        .select-list-group .select-list-group-search:focus+.select-list-group__toggle:after {
          content: "^";
        }
        .select-list-group [data-toggle="false"] {
          display: none;
        }
        .select-list-group [data-toggle="true"] {
          display: inherit;
          box-shadow: 0 3px 7px -2px rgba(0, 0, 0, 0.2);
        }
        .select-list-group li[data-display="false"] {
          display: none;
        }
        .select-list-group li[data-display="true"] {
          display: inherit;
        }
        .select-list-group li[data-highlight="false"] {
          border-left: 0;
        }
        .select-list-group li[data-highlight="true"] {
          color: white;
          background-color: grey;
        }
        .select-list-group::after {
          position: absolute;
          right: 0;
          margin-right: -5px;
          top: 25px;
          right: 35px;
          content: "";
          width: 10px;
          height: 10px;
          background: url(https://image.flaticon.com/icons/png/512/25/25756.png);
          background-repeat: no-repeat;
          background-size: 10px 10px;
        }
    </style>
@endsection
@section('content')
<div class="clearfix"></div>

<!-- Main Banner Section Start -->
<div class="banner dark-opacity" style="background-image: url(assets/img/home-banner.jpg);" data-overlay="8">
    <div class="container">
        <div class="banner-caption">
            <div class="col-md-12 col-sm-12 banner-text">
                <h1>Share Your Experience & Help Others</h1>
                <h2>Is An Open Community For Free Technical Stuffs.</h2>
                <form class="form-verticle">
                    <div class="col-md-3 col-sm-12 no-padd"></div>
                    <div class="col-md-6 col-sm-12 no-padd">
                        <i class="banner-icon fa fa-search"></i>
                        <input type="text" class="form-control left-radius right-br" placeholder="Enter search term here" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
@if($category)
<section class="testimonials-3 theme-overlap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-3" class="slick-carousel-3">
                    @foreach($category as $list)
                    <div class="testimonial-detail">
                        <div class="client-detail-box">
                            <a href="{{url('/'.$list->slug)}}">
                                <div class="pic">
                                    <img src="{{url($list->icon)}}" alt="{{$list->alt}}" />
                                </div>
                                <div class="client-detail">
                                    <span class="post">Top {{$list->name}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="mt-5">
    <div class="container container-m">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="heading">
                    <h2>Why choose <span>Setup Guide</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="package-box">
                    <div class="package-header">
                        <img src="assets/img/value.png" alt="" />
                        <h3>Professional</h3>
                    </div>
                    <div class="package-price">
                        <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="package-box">
                    <div class="package-header">
                        <img src="assets/img/good.png" alt="" />
                        <h3>Platform & tools</h3>
                    </div>
                    <div class="package-price">
                        <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="package-box">
                    <div class="package-header">
                        <img src="assets/img/chat.png" alt="" />
                        <h3>Support</h3>
                    </div>
                    <div class="package-price">
                        <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- company Details -->
@if(count($blog)>0)
<section class="m-blog">
    <div class="container container-m">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="heading">
                    <h2>News <span>/ Blogs</span></h2>
                </div>
            </div>
           @foreach($blog as $list)
                <div class="col-md-4 col-sm-4 shadows">
                    <div class="blog-box blog-grid-box">
                        <div class="blog-grid-box-img ">
                            <a href="{{url('blog/'.$list->slug)}}"><img src="{{asset($list->image)}}" class="img-responsive" alt="{{$list->alt}}" /> </a>
                            <div class="blog-post-date theme-bg"><span class="dtBlog">{{ $list->created_at->format('d') }}</span><span>{{ $list->created_at->format('M') }}</span></div>
                        </div>
                        <div class="blog-grid-box-content">
                            <h4><a href="{{url('blog/'.$list->slug)}}"> {{$list->title}} </a></h4>
                            <div class="post-meta">
                                <span class="author"><i class="ti-user"></i><a href="#" title="Posts by admin">James</a></span>
                                <span class="author"><i class="ti-comment-alt"></i>0 Comments</span>
                            </div>
                            <p>{{substr(strip_tags($list->description),0,120)}}...</p>
                            <a href="{{url('blog/'.$list->slug)}}" class="theme-cl" title="Read More..">Continue...</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endif
<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <div class="heading">
                    <h2>Most Common <span>FAQ'S</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="panel-group style-1" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="designing">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Web Designing
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="designing">
                            <div class="panel-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo.
                                    Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="web-development">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Web Development
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="web-development">
                            <div class="panel-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo.
                                    Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="E-commerce">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    E-commerce Development
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="E-commerce">
                            <div class="panel-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo.
                                    Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="panel-group style-2" id="accordion2" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="choose-us">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                    Why People Choose Us
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="choose-us">
                            <div class="panel-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo.
                                    Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="who">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                    Who We Are
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="who">
                            <div class="panel-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo.
                                    Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="work">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                    Our Work Process
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="work">
                            <div class="panel-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo.
                                    Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop