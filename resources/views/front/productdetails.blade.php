@extends('layouts.front')
@section('content')
@section('css')
<style>
.head-top ul.head-ul {
    padding: 0px 0;
}
.blog-grid-box-content h4 {
    font-size: 20px;
}
.faq-sec-1 {
    margin-top: 0px;
}
.faq-sec #accordion .panel-title a,
.faq-sec #accordion2 .panel-title a {
    padding: 30px 30px;
}
.pagination li:last-child a {
    background: #0f5298;
    border: 1px solid #35434e;
}
.pagination li:hover a {
    background: #fff;
    border: 1px solid #35434e;
}
</style>
@endsection
<div class="clearfix"></div>
<div class="product-det">

    <section class="section-csk padd-bot-40 padd-top-40 product-det">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-8 bg-light">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-4 text-center">
                            <img src="{{asset($product->image)}}" class="img-responsive" alt="{{$product->alt}}" />
                        </div>
                        <div class="col-md-8 list-cl">
                            <h1>{{$product->name}}</h1>
                            <div class="ratrev-sec d-flex align-items-center justify-content-between">
                                <p>Review: <span>20</span></p>
                                <p>
                                    Rating:<b> 4.5</b> <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span>
                                </p>
                            </div>
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="row">
                        <div class="sm-sec">
                            <div class="btn1-c" data-toggle="modal" data-target="#myModal">
                                <a href="#!">Download Trial Version </a>
                            </div>
                            <div class=""></div>
                        </div>
                        <div class="btn1-c">
                            <a href="#">GUIDEBOOK FOR SETUP</a>
                        </div>
                        <div class="btn1-c">
                            <a href="#!" data-toggle="modal" data-target="#myModal">
                                <span><img src="{{asset('assets/img/guide-book.webp')}}" /></span> RESOLVE YOUR ISSUES
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="comp-detsec padd-top-0">
    <div class="res-issue mrg-bot-20">
        <h2>Customer Issues We Resolve Here</h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- =============== Blog Detail ================= -->
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="comments">
                            <div class="cdet-cont-m">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-1 text-center padd-r-0">
                                        <div class="solve-tim">
                                            <p>30 Mins</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="cdet-cont">
                                            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Praesent Nisl Lorem, Dictum Id Pellentesque At, Vestibulum Ut Arcu. Curabitur Erat Libero</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="comp-btn"><a href="#" class="btn theme-btn" title="">Resolve</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="cdet-cont-m in-pross">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-1 text-center padd-r-0">
                                        <div class="solve-tim">
                                            <p>43 Mins</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="cdet-cont">
                                            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Praesent Nisl Lorem, Dictum Id Pellentesque At, Vestibulum Ut Arcu. Curabitur Erat Libero</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="comp-btn"><a href="#" class="btn theme-btn" title="">Pending</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="cdet-cont-m">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-1 text-center padd-r-0">
                                        <div class="solve-tim">
                                            <p>50 Mins</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="cdet-cont">
                                            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Praesent Nisl Lorem, Dictum Id Pellentesque At, Vestibulum Ut Arcu. Curabitur Erat Libero</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="comp-btn"><a href="#" class="btn theme-btn" title="">Resolve</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="cdet-cont-m in-pross">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-1 text-center padd-r-0">
                                        <div class="solve-tim">
                                            <p>1:280 Mins</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="cdet-cont">
                                            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Praesent Nisl Lorem, Dictum Id Pellentesque At, Vestibulum Ut Arcu. Curabitur Erat Libero</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="comp-btn"><a href="#" class="btn theme-btn" title="">pending</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="cdet-cont-m">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-1 text-center padd-r-0">
                                        <div class="solve-tim">
                                            <p>1:41 Mins</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="cdet-cont">
                                            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Praesent Nisl Lorem, Dictum Id Pellentesque At, Vestibulum Ut Arcu. Curabitur Erat Libero</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="comp-btn"><a href="#" class="btn theme-btn" title="">Resolve</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="cdet-cont-m in-pross">
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-1 text-center padd-r-0">
                                        <div class="solve-tim">
                                            <p>2:30 Mins</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="cdet-cont">
                                            <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Praesent Nisl Lorem, Dictum Id Pellentesque At, Vestibulum Ut Arcu. Curabitur Erat Libero</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="comp-btn"><a href="#" class="btn theme-btn" title="">Resolve</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-8 -->
        </div>
    </div>
</section>
@if(count($product->faqs) > 0)
    <section class="faq-sec-1">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-12 text-left">
                    <div class="heading">
                        <h2><span>FAQ'S</span></h2>
                    </div>
                </div>
            </div>
            <div class="faq-sec">
                <div class="row">
                    @foreach($product->faqs as $index=>$faq)
                        <div class="col-md-6 col-sm-12">
                            <div class="panel-group style-1" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="designing">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$index}}" aria-expanded="@if($index == 0) true @else false @endif" aria-controls="collapse{{$index}}">
                                               {{$faq->question}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$index}}" class="panel-collapse collapse @if($index == 0) in @endif" role="tabpanel" aria-labelledby="designing">
                                        <div class="panel-body">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif


@stop