@extends('layouts.front')


@section('content')
<div class="clearfix"></div>
<section>
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-sm-12">
            <article class="blog-news detail-wrapper">
               <div class="full-blog">
                  <figure class="img-holder">
                     <img src="{{asset($blog->image)}}" class="img-responsive " alt="{{$blog->alt}}">
                     <div class="blog-post-date theme-bg">
                        {{ $blog->created_at->format('M d, Y') }}
                     </div>
                  </figure>
                  <!-- Blog Content -->
                  <div class="full blog-content">
                     <div class="post-meta">
                        <span class="author"><i class="ti-user"></i><a href="#" title="Posts by admin">James</a></span>
                        <span class="author"><i class="ti-calendar"></i>{{ $blog->created_at->format('M d, Y') }}</span>
                        <span class="author"><i class="ti-comment-alt"></i>0 Comments</span>
                     </div>
                     <div id="bg1" class="page-section">
                        <h1 class="bl-title">{{$blog->title}}</h1>
                       
                        <div class="blog-text">
                           {!! $blog->description !!}
                        </div>

                     </div>
                     @if(count($blog->faq)>0)
                     <section class="faq">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-md-12 text-left">
                                 <h3 class="bl-title">FAQ'S :</h3>
                              </div>
                           </div>
                           <br>
                           <div class="faq-secction">
                              <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                    <div class="panel-group style-1" id="accordion" role="tablist" aria-multiselectable="true">
                                       @foreach($blog->faq as $faq)
                                       <div class="panel panel-default">
                                          <div class="panel-heading" role="tab">
                                             <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded=" @if($loop->first) {{"true"}} @else {{"false"}} @endif" aria-controls="collapse{{$faq->id}}">
                                                {{$faq->question}}
                                                </a>
                                             </h4>
                                          </div>
                                          <div id="collapse{{$faq->id}}" class="panel-collapse collapse @if($loop->first) {{"in"}} @endif" role="tabpanel">
                                          <div class="panel-body">
                                             {!! $faq->answer !!}
                                          </div>
                                       </div>
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
                  </section>
                  @endif
                  @if(count($blog->tags)>0)
                  <div class="blog-text">
                     <div class="post-tags">
                        <strong>Tags:</strong>
                        @foreach($blog->tags as $list)
                        <a>{{ucwords($list->name)}}</a>
                        @endforeach
                     </div>
                  </div>
                  @endif
                  <!-- Blog Share Option -->
                  <div class="row no-mrg">
                     <div class="blog-footer-social">
                        <span>Share <i class="fa fa-share-alt"></i></span>
                        <ul class="list-inline social">
                            <li class="facebook" data-toggle="tooltip" data-placement="top" title="facebook"><a href="https://www.facebook.com/sharer.php?u={{url('blog/'.$blog->slug)}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter" data-toggle="tooltip" data-placement="top" title="twitter"><a href="https://twitter.com/intent/tweet?url={{url('blog/'.$blog->slug)}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                             <li class="linkedin" data-toggle="tooltip" data-placement="top" title="linkedin"><a href="https://www.linkedin.com/shareArticle?url={{url('blog/'.$blog->slug)}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                             <li class="pinterest" data-toggle="tooltip" data-placement="top" title="pinterest"><a href="https://www.pinterest.com/pin/create/button?url={{url('blog/'.$blog->slug)}}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- Blog Content -->
         </div>
         </article>
         <!-- /.Article -->
      </div>
      <!-- /.col-md-8 -->
      <!-- ===================== Blog Sidebar ==================== -->
      <div class="col-md-4 col-sm-12" id="sidebar">
         <div class="sidebar" id="main-content">
            <div class="sidebar__inner">
               @if(count($toc)>0)
                  <div class="widget-boxed">
                     <div class="widget-boxed-header">
                        <h4><i class="ti-check-box padd-r-10"></i>Contents</h4>
                     </div>
                     <div class="widget-boxed-body padd-top-5">
                        <div class="side-list">
                           <ul class="side-blog-list" id="sides">
                              @foreach($toc as $index=>$list)
                              <li>
                                 <div class="blog-list-info">
                                    <h5><a href="#{{$blog->slug}}-{{$index+1}}" title="blog">{{strip_tags($list)}}</a></h5>
                                 </div>
                              </li> 
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               @endif
               <div class="widget-boxed">
                  <div class="widget-boxed-header">
                     <h4><i class="ti-check-box padd-r-10"></i>Need Support?</h4>
                  </div>
                  <div class="blog-post-meta">
                     <span class="updated">Can't find the answer you're looking for? Don't worry, we're here to help!</span>              
                  </div>
                  <button type="submit" class="btn btn-package" data-toggle="modal" data-target="#myModal">Visit setupguidebook.com</button>
               </div>
               <!--end support-->
               <!-- Start: Latest Blogs -->
               <div class="widget-boxed">
                  <div class="widget-boxed-header">
                     <h4><i class="ti-check-box padd-r-10"></i>Latest Blogs</h4>
                  </div>
                  <div class="widget-boxed-body padd-top-5">
                     <div class="side-list">
                        <ul class="side-blog-list">
                           @foreach($recent as $list)
                            <li>
                              <a href="#">
                                 <div class="blog-list-img">
                                    <img src="{{asset($list->image)}}" class="img-responsive blog-imgs" alt="{{$list->alt}}">
                                 </div>
                              </a>
                              <div class="blog-list-info">
                                 <h5><a href="{{url('blog/'.$list->slug)}}" title="blog">{{$list->title}}</a></h5>
                                 <div class="blog-post-meta">
                                    <span class="updated">{{ $list->created_at->format('M d, Y') }}</span>              
                                 </div>
                              </div>
                           </li>
                            @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- End: Latest Blogs -->
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<!--  <div class="spacing"></div> -->
<!-- ================ Start Footer ======================= -->
@stop

@section('js')
<script>
   $(document).ready(function(){
      let $id = 1;
      let $bslug = "{{$blog->slug}}";
      $( ".blog-text h2" ).each(function() {
         $( this ).attr( "id", $bslug+'-'+$id++ );
      });

   });

</script>
<script src="{{asset('assets/js/stickey-sidebar.js')}}"></script>
<script>
var sidebar = new StickySidebar('#sidebar', {
    containerSelector: '#main-content',
    innerWrapperSelector: '.sidebar__inner',
    topSpacing: 20,
    bottomSpacing: 20
    });

</script>
<script>
    // $(document).ready(function(){

    // href auto scroll active
    $(document).ready(function() {
    $('a[href*=#]').bind('click', function(e) {
    e.preventDefault(); // prevent hard jump, the default behavior

    var target = $(this).attr("href"); // Set the target as variable

    // perform animated scrolling by getting top-position of target-element and set it as scroll target
    $('html, body').stop().animate({
            scrollTop: $(target).offset().top
    }, 600, function() {
            location.hash = target; //attach the hash (#jumptarget) to the pageurl
    });

    return false;
            });
    });

   $(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();
    // Assign active class to nav links while scolling
    $('.page-section').each(function(i) {
            if ($(this).position().top <= scrollDistance) {
                    $('#sides .blog-list-info a.active').removeClass('active');
                    $('#sides .blog-list-info a').eq(i).addClass('active');
            }
    });
 }).scroll();
            
  </script> 
  
  


@endsection