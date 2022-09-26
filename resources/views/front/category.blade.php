@extends('layouts.front')

@section('content')
<div class="clearfix"></div>
<!-- Main Banner Section Start -->
<div class="banner dark-opacity category-page" style="background-image:url(assets/img/home-banner.jpg);" data-overlay="8">
    <div class="container">
       <div class="banner-caption">
          <div class="col-md-12 col-sm-12 banner-text">
             <h1>Setup Guide Book</h1>
             <h2>Is An Open Community For Free Technical Stuffs.</h2>
             <form class="form-verticle">
                <div class="col-md-3 col-sm-12 no-padd"></div>
                <div class="col-md-6 col-sm-12 no-padd">
                   <i class="banner-icon fa fa-search"></i>
                   <input type="text" class="form-control left-radius right-br" placeholder="Enter search term here">
                </div>
             </form>
          </div>
       </div>
    </div>
    <div class="breadcrumbs">
       <span><a href="index.php"><i class="fa fa-home"></i></a></span>
       <span class="gt3_breadcrumb_divider"></span>
       <span class="current">All Companies</span>
    </div>
 </div>
 <div class="clearfix"></div>
 <section class="cagegory-sec">
    <div class="container container-m">
       <div class="row">
        @foreach($category as $list)
            <div class="col-md-6 col-sm-5">
                <a href="{{url($list->slug)}}" class="place-box">
                    <div class="place-box-content">
                    <h4>Top {{$list->name}} Companies</h4>
                    </div>
                    <div class="place-box-bg" style="background-image: url({{asset($list->image)}});"></div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
 </section>


@stop