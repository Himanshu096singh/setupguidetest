@extends('layouts.front')
@section('content')

<style>
.mbb{margin-bottom:100px;}

</style>
<div class="clearfix"></div>
 <!-- Main Banner Section Start -->
 <div class="banner dark-opacity category-page" style="background-image: url({{asset('assets/img/bgsupport.jpg')}}); filter: brightness(0.9);" data-overlay="8">
    <div class="container">
        <div class="banner-caption">
            <div class="col-md-12 col-sm-12 banner-text">
                <h1>{{$setup->title}}</h1>
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
            <a href="{{url('/')}}"><i class="fa fa-home"></i></a>
        </span>
        <span class="gt3_breadcrumb_divider"></span>
        <span>
            <a href="{{route('setup')}}">How to Setup</a>
        </span>
        <span class="gt3_breadcrumb_divider"></span>
        <span class="current"> {{$setup->title}}</span>
    </div>
</div>

<div class="clearfix"></div>


<div class="container">
<div class="row d-flex justify-content-center" >
<div class="col-md-10 ">
    <div role="tabpanel" class="tab-pane fade   active in" id="setup1">
        <!--heading-->
         <div class="setupdesc">
            {!! $setup->description !!}
        </div>
        <!--pre requsite  -->
            <div class="panel-group style-1" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="designing">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Prerequisite
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="designing" aria-expanded="true">
                        <div class="panel-body">
                           {!! $setup->prerequisite !!}
                        </div>
                    </div>
                </div>
            </div>
        <!-- end pre requisite -->
         <div class="tab style-1 mbb" role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Install on a PC</a></li>
                <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true">Install on a Mac</a></li>
                <li role="presentation" class=""><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="true">Need help?</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabs">
                <div role="tabpanel" class="tab-pane fade active" id="home">
                    {!! $setup->window !!}
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile">
                    {!! $setup->mac !!}
                </div>
                 <div role="tabpanel" class="tab-pane fade in" id="messages">
                    <h3>Sign in or installation FAQ</h3>
                    <p>The following are a few of the more common questions or issues when trying to install Software.</p>
                    <p><strong>Account questions:</strong></p>
                    <div class="panel-group style-1" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="designing">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1" class="collapsed">
                                        I don't have a Setup Guide Bookaccount yet, or I forgot my username or password
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="designing" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <p>
                                        I don't have a Setup Guide Bookaccount yet, or I forgot my username or password Before you can install Setup Guide Bookor Software 2021 you need to associate it with a Setup Guide
                                        Bookaccount, or work or school account.
                                        <br>
                                        If you have an Software for home product and bought Software at a retail store or online store, but don't have a Setup Guide Bookaccount, it's possible you haven't redeemed your
                                        product key yet (if you got one), or you missed the step for linking your recent purchase with an account. Do the following to link an account with Software.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="designing">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2" class="collapsed">
                                        How many computers can I install Software on?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="designing" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <p>
                                        I don't have a Setup Guide Bookaccount yet, or I forgot my username or password Before you can install Setup Guide Bookor Software 2021 you need to associate it with a Setup Guide
                                        Bookaccount, or work or school account.
                                        <br>
                                        If you have an Software for home product and bought Software at a retail store or online store, but don't have a Setup Guide Bookaccount, it's possible you haven't redeemed your
                                        product key yet (if you got one), or you missed the step for linking your recent purchase with an account. Do the following to link an account with Software.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@stop