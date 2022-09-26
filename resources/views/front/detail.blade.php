@extends('layouts.front')

@section('content')
<div class="clearfix"></div>
<div class="banner dark-opacity category-page" style="background-image:url(assets/img/bgsupport.jpg);filter: brightness(0.9);" data-overlay="8">
   <div class="container">
      <div class="banner-caption">
         <div class="col-md-12 col-sm-12 banner-text">
            <h1>Popular Companies </h1>
              <form class="form-verticle">
               <div class="col-md-3 col-sm-12 no-padd"></div>
               <div class="col-md-6 col-sm-12 no-padd">
                  <i class="banner-icon fa fa-search"></i>
                  <input type="text" id="myInput" onkeyup="myFunction()" class="form-control left-radius right-br" placeholder="Enter Software Company">
               </div>
            </form>
            <div id="result"></div>
         </div>
      </div>
   </div>
   <div class="breadcrumbs">
      <span><a href="{{url('/')}}"><i class="fa fa-home"></i></a></span>
      <span class="gt3_breadcrumb_divider"></span>
      <span class="current">{{$category->name}}</span>
   </div>
</div>
<div class="clearfix"></div>
<!-- Main Banner Section End -->
<section class="cat2-msec">
   <div class="container container-m">
      <div class="row d-flex justify-content-center">
         <div class="col-md-10 ">
            <div class="heading">
               <h2>Top Companies - <span>{{$category->name}}</span></h2>
            </div>
         </div>
      </div>
      <div class="row d-flex justify-content-center">
        @foreach($category->companies as $index => $list)
        <div class="col-lg-9 col-sm-12 mrg-bot-25">
            <div class="row compny-sec no-gutter">
               <div class="col-sm-8">
                  <div class="d-flex align-items-center">
                     <div class="comp-n">
                        <p>{{$index+1}}</p>
                     </div>
                     <div class="comp-deta">
                        <h3> {{$list->name}} </h3>
                        <p> {{$list->headquarter}} </p>
                        <p class="comp-catp"><span class="cat-bg">Category: {{$category->name}} </span> <span>( 5.0 <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>)</span></p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="comp-btn rissu"><a href="javascript:void()" class="btn theme-btn "data-toggle="modal" data-target="#myModal">Resolve Issue</a></div>
                  <div class="comp-btn"><a href="{{url($category->slug.'/'.$list->slug)}}" class="btn theme-btn" title="View {{$list->name}}">View Company</a></div>
               </div>
            </div>
         </div>
        @endforeach
         

      </div>
   </div>
</section>

@stop