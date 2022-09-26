@extends('layouts.front')
@section('content')

<div class="clearfix"></div>
 <!-- Main Banner Section Start -->
 <div class="banner dark-opacity category-page" style="background-image: url(assets/img/bgsupport.jpg); filter: brightness(0.9);" data-overlay="8">
    <div class="container">
        <div class="banner-caption">
            <div class="col-md-12 col-sm-12 banner-text">
                <h1>Free consultancies & Setup Guide Book </h1>
                <h2>Search for Any Guidebook .</h2>
                <form class="form-verticle">
                    <div class="col-md-3 col-sm-12 no-padd"></div>
                     <div class="col-md-6 col-sm-12 no-padd">
                        <i class="banner-icon fa fa-search"></i>
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control left-radius right-br" placeholder="Enter Software Company">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <span>
            <a href="index.php"><i class="fa fa-home"></i></a>
        </span>
        <span class="gt3_breadcrumb_divider"></span>
        <span class="current"> Install and Setup</span>
    </div>
</div>

<div class="clearfix"></div>

<!-- installation Process -->
<section class="install_setup">
    <div class="container">
        <div class="row">
            <!-- download and install -->
            <div class="col-md-12 col-sm-12">
                <div class="tab style-1" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($setup as $list)
                            <li role="presentation" class=""><a href="{{url('how-to-setup/'.$list->slug)}}">
                                <div class="pic">
                                    <img src="{{asset($list->image)}}" alt="{{$list->alt}}" class='img-fluid'>
                                </div><strong>{{$list->title}}</strong></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@stop