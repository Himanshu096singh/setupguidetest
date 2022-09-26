@extends('layouts.front')

@section('content')

<div class="clearfix"></div>
<!-- Main Banner Section Start -->
<section class="section-csk padd-bot-40 padd-top-40 product-det">
   <div class="container-fluid">
      <div class="row">
         <div class=" {{( ($company->type == 0) ? "col-lg-12 col-md-12" : "col-lg-9 col-md-8" )}} bg-light">
            <div class="row d-flex align-items-center">
               <div class="col-md-4 text-center">
                  <img src="{{asset($company->image)}}" class="img-responsive" alt="{{$company->alt}}" />
               </div>
               <div class="col-md-8 list-cl">
                  <h1>{{$company->name}}</h1>
                  <div class="ratrev-sec">
                     <h4>{{$company->category->name}}</h4>
                     <ul class="d-flex flex-wrape">
                        @foreach($company->products as $list)
                        <li><a href="{{url($company->category->slug.'/'.$company->slug.'/'.$list->slug)}}">{{$list->name}}</a></li> 
                     @endforeach
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         @if($company->type == 1)
         <div class="col-lg-3 col-md-4">
            <div class="row">
               <div class="sm-sec ">
                  <div class="btn1-c companyinfo " data-toggle="modal" data-target="#myModal">
                     <a href="#!">Company Number</a>
                  </div>
               </div>
               <div class="btn1-c info" data-toggle="modal" data-target="#myModal">
                  <a href="#">Immidiate Support</a>
               </div>
               <!-- <div class="btn1-c">
                  <a href="#"><span><img src="assets/img/guide-book.webp"></span> Request a Call Back</a>
                  </div> -->
               <div class="btn1-c">
                  <a href="#"> Request a Call Back</a>
               </div>
            </div>
         </div>
         @endif
      </div>
   </div>
</section>
<div class="clearfix"></div>
<!-- Main Banner Section End -->
<!-- main section -->
<!-- company Details -->
<section>
   <div class="container-fluid">
      <div class="row">
         <!-- =============== Blog Detail ================= -->
         <div class="col-md-8 col-sm-12">
            <div class="row detail-wrapper">
               <div class="col-md-12 col-sm-12">
                  <div class="row">
                     <div class="col-md-12 col-sm-12">
                        <div class="comments">
                           <div class="comments-title">
                              <h2>COMPANY DETAILS</h2>
                           </div>
                           <div class="cdet-cont-m">
                              <div class="row d-flex align-items-center">
                                 <div class="col-sm-4">
                                    <h4>Company Name</h4>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="cdet-cont">
                                       <p>{{$company->name}}</p>
                                    </div>
                                 </div>
                              </div>
                              @if(isset($company->headquarter))
                              <div class="row d-flex align-items-center">
                                 <div class="col-sm-4">
                                    <h4>Head Quarter</h4>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="cdet-cont">
                                       <p>{{$company->headquarter}}</p>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @if(isset($company->founder))
                              <div class="row d-flex align-items-center">
                                 <div class="col-sm-4">
                                    <h4>Founders</h4>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="cdet-cont">
                                       <p>{{$company->founder}}</p>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @if(isset($company->ceo))
                              <div class="row d-flex align-items-center">
                                 <div class="col-sm-4">
                                    <h4>CEO</h4>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="cdet-cont">
                                       <p>{{$company->ceo}}</p>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @if(isset($company->insceptiondate))
                              <div class="row d-flex align-items-center">
                                 <div class="col-sm-4">
                                    <h4>Inception Date</h4>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="cdet-cont">
                                       <p>{{$company->insceptiondate}}</p>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @if(isset($company->mosthearedbrand))
                              <div class="row d-flex align-items-center">
                                 <div class="col-sm-4">
                                    <h4>Most Heard Brand</h4>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="cdet-cont">
                                       <p>{{$company->mosthearedbrand}}</p>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @if(isset($company->totalassets))
                              <div class="row d-flex align-items-center">
                                 <div class="col-sm-4">
                                    <h4>Total assets</h4>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="cdet-cont">
                                       <p>{{$company->totalassets}}</p>
                                    </div>
                                 </div>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- our history -->
            <div class="row detail-wrapper">
               <div class="col-md-12">
                  <div class="heading">
                     <h2>History</h2>
                  </div>
                  <div class="detail-wrapper-body" style="padding-top: 1em;">
                     {!! $company->history !!}
                  </div>
               </div>
               <!-- <div class="col-md-6">
                  <img src="assets/img/blog/blog-3.jpg" class="img-responsive" alt="">
                  </div> -->
            </div>
            <!-- end our history -->
            <!-- list of product -->
            @if(count($company->products)>0)
               <section>
               <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                     <div class="heading">
                        <h2>List of Product</h2>
                     </div>
                  </div>
               </div>
               <div class="row">
                  @foreach($company->products as $list)
                     <div class="col-md-3 col-sm-6">
                        <div class="package-box">
                           <a href="{{url($company->category->slug.'/'.$company->slug.'/'.$list->slug)}}">
                              <div class="package-header">
                                 <img src="{{asset($list->image)}}" alt="{{$list->alt}}" />
                                 <h3>{{$list->name}}</h3>
                              </div>
                           </a>
                        </div>
                     </div>
                  @endforeach
               </div>
               </section>
            @endif
            <!-- end list of Product -->
            <!-- Market share and Current Stage -->
            @if($company->marketshare)
            <section>
               <div class="row detail-wrapper">
                  <div class="col-md-12">
                     <div class="heading">
                        <h2><span>Market share and Current Stage</span></h2>
                     </div>
                  </div>
                  @if(isset($company->namarketshareimageme))
                  <div class="col-md-6">
                     <img src="{{asset($company->namarketshareimageme)}}" class="img-responsive" alt="{{$company->alt}}" />
                  </div>
                  @endif
                  <div class="@if(isset($company->namarketshareimageme)) col-md-6 @else col-md-12 @endif">
                     <div class="detail-wrapper-body">
                        <p>
                           {{$company->marketshare}}
                        </p>
                     </div>
                  </div>
               </div>
            </section>
            @endif
            <!-- end market share and Current Stage -->
            <!-- Competitor Analysis -->
            @if(isset($company->competitoranalysis))
            <section>
               <div class="row detail-wrapper">
                  <div class="col-md-12">
                     <div class="heading padd-t-10">
                        <h2><span>Competitor Analysis</span></h2>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="detail-wrapper-body">
                        <p>
                           {{$company->competitoranalysis}}
                        </p>
                     </div>
                  </div>
                </div>
            </section>
            @endif
            <!-- end Competitor Analysis -->
            <!-- FAQ -->
            @if(count($company->faqs)>0)
            <section>
               <div class="row mb-3">
                  <div class="col-md-12 text-center">
                     <div class="heading">
                        <h2><span>FAQ'S</span></h2>
                     </div>
                  </div>
               </div>
               <div class="row" style="padding-left: 10px;">
                    @foreach($company->faqs as $list)
                        <div class="col-md-6 col-sm-12">
                            <div class="panel-group style-1" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="faq{{$list->id}}">
                                        <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$list->id}}" aria-expanded="@if($loop->first) {{"true"}} @else {{"false"}} @endif" aria-controls="collapse{{$list->id}}">
                                        {{$list->question}}
                                        </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$list->id}}" class="panel-collapse collapse @if($loop->first) {{"in"}} @endif" role="tabpanel" aria-labelledby="faq{{$list->id}}">
                                        <div class="panel-body">
                                        {!! $list->answer !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
               </div>
            </section>
            @endif
            <!-- end FAQ -->
            <!-- Discloser -->
            <section>
               <div class="row mb-3">
                  <div class="active package-box">
                     <div class="package-header">
                        <h3>Affiliation Disclosure</h3>
                     </div>
                     <p>We are an independent service provider and may offer charge/ subscription option for premium services although free service/warranty may be available by your vendor.</p>
                  </div>
               </div>
            </section>
            <!-- end Discloser -->
         </div>
         <!-- /.col-md-8 -->
         <!-- ===================== Blog Sidebar ==================== -->
         <div class="col-md-4 col-sm-12">
            <div class="sidebar">
               <div class="detail-wrapper">
                  <div class="detail-wrapper-body">
                     {{-- <div class="listing-title-bar">
                        <h3>Company Overview</h3>
                        <div>
                           <h5><a href="#" title="rate"> Setup Guidbook Rating</a></h5>
                           <div class="rating-box">
                              <div class="detail-list-rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-half-o"></i>
                              </div>
                              <a href="#" class="detail-rating-count">100+ Rating</a>
                           </div>
                        </div>
                     </div> --}}
                     <div class="blogs padd-top-20">
                        <h4><i class="ti-check-box padd-r-10"></i>Company Related Blogs</h4>
                        <div class="widget-boxed-body padd-top-5">
                           <div class="side-list">
                              <ul class="side-blog-list">
                                 @foreach($blog as $list)
                                    <li>
                                       <a href="{{url('blog/'.$list->slug)}}">
                                          <div class="blog-list-img">
                                             <img src="{{url($list->image)}}" class="img-responsive" alt="{{$list->alt}}" />
                                          </div>
                                       </a>
                                       <div class="blog-list-info">
                                          <h5><a href="{{url('blog/'.$list->slug)}}" title="blog">{{$list->title}}</a></h5>
                                          
                                       </div>
                                    </li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End: Latest Blogs -->
            </div>
         </div>
      </div>
   </div>
</section>

@stop