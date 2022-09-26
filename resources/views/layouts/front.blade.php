<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="shortcut icon" href="{{asset($settings->fevicon)}}">
      @if(isset($meta)) <title>{{$meta['metatitle']}}</title>
         <meta name="description" content="{{$meta['metadescription']}}">
         <meta name="keywords" content="{{$meta['metakeywords']}}">
         <meta property="og:locale" content="en_US" />
      	<meta property="og:type" content="website" />
      	<meta property="og:site_name" content="{{config('app.name') }}" />
      	<meta property="og:title" content="{{$meta['metatitle']}}"/>
      	<meta property="og:description" content="{{$meta['metadescription']}}"/>
      	<meta property="og:url" content="{{url()->full()}}"/>
      	<meta property="og:image" content="{{url('public/'.$meta['image'])}}"/>
      	<meta property="og:image:type" content="image/jpeg" />
      	<meta name="twitter:card" content="summary">
         <meta name="twitter:title" content="{{$meta['metatitle']}}">
         <meta name="twitter:description" content="{{$meta['metadescription']}}">
         <meta name="twitter:image" content="{{url('public/'.$meta['image'])}}">
         <meta name="twitter:site" content="{{config('app.name') }}">
      @else <title>{{config('app.name') }}</title>
         <meta name="description" content="{{config('app.name') }}">
         <meta name="keywords" content="{{config('app.name') }}">
         <meta property="og:title" content="{{config('app.name') }}" />
         <meta property="og:type" content="Website" />
         <meta property="og:url" content="{{url()->full()}}" />
         <meta property="og:image" content="@if($settings) {{asset($settings->logo)}} @endif" />
         <meta name="twitter:card" content="summary">
         <meta name="twitter:description" content="{{config('app.name') }}">
         <meta name="twitter:title" content="{{config('app.name') }}">
         <meta name="twitter:image" content="@if($settings) {{asset($settings->logo)}} @endif">
         <meta name="twitter:site" content="{{config('app.name') }}">
      @endif @if(isset($settings) && $settings->index == 1)
         <meta name="robots" content="index, follow"/>
         <meta name="googlebot" content="index, follow"/>
         <meta name="bingbot" content="index, follow"/>
      @else <meta name="robots" content="noindex, nofollow"/>
         <meta name="googlebot" content="noindex, nofollow"/>
         <meta name="bingbot" content="noindex, nofollow"/>
      @endif
      <link rel="canonical" href="{{url()->current()}}" />
      <link rel="alternate" href="{{url()->current()}}" hreflang="x-default" />
      <link href="{{asset('assets/plugins/css/plugins.css')}}" rel="stylesheet" />
      <link href="{{asset('assets/css/magnific-popup.min.css')}}" rel="stylesheet" />
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
      <link href="{{asset('assets/css/responsiveness.css')}}" rel="stylesheet" />
      <link type="text/css" rel="stylesheet" id="jssDefault" href="{{asset('assets/css/colors/main.css')}}" />
      {!! $code->header !!}
   </head>
   <body class="home-2"> 
      <div class="wrapper mainWrap">
         <div class="header-m">
            <div class="head-top">
               <div class="row">
                  <div class="col-sm-6">
                     <ul class="head-ul">
                        <li><a href="{{route('about')}}">ABOUT US</a></li>
                        <li><a href="#">A-Z STORE VIEW</a> </li>
                        <li><a href="tel:{{$settings->contact}}">{{$settings->contact}}</a></li>
                     </ul>
                  </div>
                  <div class="col-sm-6 social-li-m">
                     <ul class="social-li">
                     @foreach($social as $link)
                        <li><a href="{{$link->url}}"><i class="fa fa-{{$link->name}}"></i></a></li>
                     @endforeach
                     </ul>
                  </div>
               </div>
            </div>
            <nav class="navbar navbar-default navbar-fixed  bootsnav">
               <div class="container-fluid">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                  <i class="ti-align-left"></i>
                  </button>
                  <!-- Start Header Navigation -->
                  <div class="navbar-header">
                     <a class="navbar-brand" href="{{url('/')}}">
                     <img src="{{asset($settings->logo)}}" class="logo logo-display" alt="{{$settings->alt}}">
                     <img src="{{asset($settings->logo)}}" class="logo logo-scrolled" alt="{{$settings->alt}}">
                     </a>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="navbar-menu">
                     <ul class="nav navbar-nav navbar-center m-navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                        @if (!Auth::check())
                           <li class="notice notice-warning"><a href="#!" data-toggle="modal" data-dismiss="modal" data-target="#signin"><strong>Login / Create Account </strong></a></li>
                        @else 
                           <li class="notice notice-warning"><a href="{{url('admin')}}"><strong>{{Auth::user()->name}}</strong></a> / 
                          <!--     <a href="#" aria-expanded="false" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                                `</form>
                                 <span class="theme_color_3">Logout</span>
                              </a> -->
                           </li>
                        @endif
                        <li class="notice notice-warning"><a href="search-page.php"><strong>Search Page </strong> &nbsp; <i class="fa fa-search"></i></a></li>
                        <li class="notice notice-warning"><a href="{{route('category')}}"><strong>Category View of all Companies </strong></a></li>
                     </ul>
                     <ul class="nav navbar -nav navbar-center rts" data-in="fadeInDown" data-out="fadeOutUp">
                        <li ><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('how-to-setup')}}">How to Setup</a></li>
                        <li><a href="download.php">Download And Install</a></li>
                        <li><a href="support.php">Connect to Support</a></li>
                     </ul>
                  </div>
               </div>
            </nav>
         </div>

        @yield('content')

         <footer class="footer dark-footer black-bg">
            <div class="container">
               <div class="row">
                  <div class="col-md-3 col-sm-6">
                     <div class="footer-widget">
                        <img src="{{asset($settings->whitelogo)}}" class="logo logo-display" alt="{{$settings->alt}}">
                        <div class="address-box">
                           <div class="sing-adds">{{$settings->fcontent}}</div>
                        </div>
                     </div>
                   </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="footer-widget">
                        <h3 class="widgettitle widget-title">Quick Links</h3>
                        <ul class="footer-navigation sinlge">
                           <li><a href="{{url('/')}}">Home</a></li>
                           <li><a href="{{route('blog')}}">Blog</a></li>
                           <li><a href="{{route('about')}}">About Us</a></li>
                           <li><a href="{{route('setup')}}">How to Setup</a></li>
                           <li><a href="{{route('contact')}}">Contact Us</a></li>
                           <li><a href="">Connect to Support</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class=" col-md-3 col-sm-6">
                     <div class="footer-widget">
                        <h3 class="widgettitle widget-title">Recent Blogs</h3>
                        <ul class="footer-navigation sinlge">
                           @foreach($rblog as $list)
                              <li><a href="{{url('blog/'.$list->slug)}}">{{$list->title}}</a></li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="footer-widget">
                        <div class="textwidget">
                           <h3 class="widgettitle widget-title">Get In Touch</h3>
                           <div class="address-box">
                              <div class="sing-add" style="cursor: pointer;" data-toggle="modal" data-dismiss="modal" data-target="#signin">
                                 <i class="fa fa-user"></i>Login
                              </div>
                              <div class="sing-add">
                                 <a href="mailto:{{$settings->email}}" style="color:#d5f3fe">
                                 <i class="ti-email"></i>{{$settings->email}}
                                 </a>
                              </div>
                              <div class="sing-add">
                                 <a href="tel:{{$settings->contact}}" style="color:#d5f3fe">
                                 <i class="ti-mobile"></i>{{$settings->contact}}
                                 </a>
                              </div>
                           </div>
                           <ul class="footer-social">
                              
                              @foreach($social as $link)
                              <li><a href="{{$link->url}}"><i class="fa fa-{{$link->name}}"></i> </a></li>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- ================ End Footer Section ======================= -->
         <!-- Modal -->
         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">GET A CALL BACK</h4>
                  </div>
                  <div class="modal-body">
                     <form method="post" action="thankyou.php">
                        <div class="row">
                           <div class="col-md-12" id="campanies">
                              <label for="basic-url"> Company </label>
                              <input type="text" class="form-control" name="" id="lb" disabled> 
                           </div>
                           <div class="col-md-12 nam">
                              <label for="basic-url">Name </label>
                              <input type="text" class="form-control" id="name" required >
                           </div>
                           <div class="col-md-12 mob">
                              <label for="basic-url">Mobile Number </label>
                              <div class="contact" style="display:flex;">
                                 <select class="custom-select select" >
                                    <option selected>Country...</option>
                                    <option value="1">USA</option>
                                    <option value="2">UK</option>
                                 </select>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-12 email">
                              <label for="basic-url">Email </label>
                              <input type="email" class="form-control" id="name" required>
                           </div>
                           <div class="col-md-12 iss">
                              <div class="form-group">
                                 <label for="exampleFormControlTextarea1">Issue</label>
                                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                           </div>
                           <div class="col-md-12 sbt">
                              <div class="modal-footer">
                                 <button type="submit  " class="btn btn-primary">Submit</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- end modal -->
         <!--  login modal -->
         <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title" id="modalLabel2">LogIn Your Account</h4>
                     <button type="button" class="m-close" data-dismiss="modal" aria-label="Close">
                     <i class="ti-close"></i>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="wel-back">
                        <h2>Welcome <span class="theme-cl">Back!</span></h2>
                     </div>
                 
                     <form method="POST" action="{{ route('ajaxlogin') }}" id="login_form">
                        @csrf
                        <div class="form-group">
                           <label>User Name</label>
                           
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                           @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <span class="custom-checkbox d-block">
                        <input type="checkbox" id="select1">
                        <label for="select1"></label>
                        Keep me Signed In
                        </span>
                        <div class="center">
                           <button type="submit" id="login-btn" class="btn btn-midium theme-btn btn-radius width-200"> Login </button>
                        </div>
                     </form>
                     <div class="connect-with">
                        <ul>
                           <li class="fb-ic"><a href="#"><i class="ti-facebook"></i></a></li>
                           <li class="gp-ic"><a href="#"><i class="ti-google"></i></a></li>
                           <li class="tw-ic"><a href="#"><i class="ti-twitter"></i></a></li>
                        </ul>
                     </div>
                     <div class="center mrg-top-5">
                        <div class="bottom-login text-center">Don't have an account</div>
                        <a href="javascript:void(0)" class="theme-cl" data-toggle="modal" data-dismiss="modal" data-target="#register">Create An Account</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- FOR REGISTRATION  -->
         <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title" id="modalLabel3">Create an Account</h4>
                     <button type="button" class="m-close" data-dismiss="modal" aria-label="Close">
                     <i class="ti-close"></i>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="wel-back">
                        <h2>Hi! <span class="theme-cl">How are you?</span></h2>
                     </div>
                     <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                           <label>Username</label>
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                              @error('name')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                              @error('email')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                        </div>
                        <div class="form-group">
                           <label for="basic-url">Number </label>
                           <div class="contact" style="display:flex;">
                              <select class="custom-select select" >
                                 <option selected>Country...</option>
                                 <option value="1">USA</option>
                                 <option value="2">UK</option>
                              </select>
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                           <label> Password</label>
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                           <label>Confirm Password</label>
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <span class="custom-checkbox d-block">
                           <input type="checkbox" id="select1">
                           <label for="select1"></label>
                           Keep me Signed In
                        </span>

                        <div class="center">
                           <button type="submit" id="login-btn" class="btn btn-midium theme-btn btn-radius width-200"> Register </button>
                        </div>

                     </form>
                     <div class="connect-with">
                        <ul>
                           <li class="fb-ic"><a href="#"><i class="ti-facebook"></i></a></li>
                           <li class="gp-ic"><a href="{{ route('auth.google') }}"><i class="ti-google"></i></a></li>
                           <li class="tw-ic"><a href="#"><i class="ti-twitter"></i></a></li>
                        </ul>
                     </div>
                     <div class="center mrg-top-5">
                        <div class="bottom-login text-center">Already have an account?</div>
                        <a href="javascript:void(0)" class="theme-cl" data-toggle="modal" data-dismiss="modal" data-target="#signin">Login</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Floating social icons -->
         <div class="fix-social">
            <ul class="social-box" data-toggle="modal" data-dismiss="modal" data-target="#coockies">
               <li class="facebook"><img class="fa" src="{{asset('assets/img/coockies.png')}}"></li>
            </ul>
         </div>
         <!--End Floating social icons -->
         <!-- ===================== End Login & Sign Up Window =========================== -->
         <a id="back2Top" class="theme-bg" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
         <!-- START JAVASCRIPT -->
         <script src="{{asset('assets/js/jquery.min.js')}}"></script>
         <script src="{{asset('assets/plugins/js/bootstrap.min.js')}}"></script>
         <script src="{{asset('assets/plugins/js/bootsnav.js')}}"></script>
         <script src="{{asset('assets/plugins/js/bootstrap-select.min.js')}}"></script>
         <script src="{{asset('assets/plugins/js/bootstrap-touch-slider-min.js')}}"></script>
         <script src="{{asset('assets/plugins/js/jquery.touchSwipe.min.js')}}"></script>
         <script src="{{asset('assets/plugins/js/chosen.jquery.js')}}"></script>
         <script src="{{asset('assets/plugins/js/datedropper.min.js')}}"></script>
         <script src="{{asset('assets/plugins/js/dropzone.js')}}"></script>
         <script src="{{asset('assets/plugins/js/jquery.counterup.min.js')}}"></script>
         <script src="{{asset('assets/plugins/js/jquery.fancybox.js')}}"></script>
         <script src="{{asset('assets/plugins/js/jquery.nice-select.js')}}"></script>
         <script src="{{asset('assets/plugins/js/jqueryadd-count.js')}}"></script>
         <script src="{{asset('assets/plugins/js/jquery-rating.js')}}"></script>
         <script src="{{asset('assets/plugins/js/slick.js')}}"></script>
         <script src="{{asset('assets/plugins/js/timedropper.js')}}"></script>
         <script src="{{asset('assets/plugins/js/waypoints.min.js')}}"></script>
         <script src="{{asset('assets/js/jQuery.style.switcher.js')}}"></script>
         <!-- Custom Js -->
         <script src="{{asset('assets/js/custom.js')}}"></script>
         <script src="{{asset('assets/js/coockies.js')}}"></script>
         <script>
            function openRightMenu() {
                document.getElementById("rightMenu").style.display = "block";
            }
            function closeRightMenu() {
                document.getElementById("rightMenu").style.display = "none";
            }
         </script>
         <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
         </script>
         <script type="text/javascript">
            $(document).ready(function() {
            $('select').niceSelect();
            });	
         </script>

<script>
   $("#login_form").submit(function(e){
      e.preventDefault();
      var all = $(this).serialize();
      console.log(all);
   
         $.ajax({
         url:  $(this).attr('action'),
         type: "POST",
         data: all,
         beforeSend:function(){
            $(document).find('span.error-text').text('');
         },
            // //validate form with ajax. This will be communicating 
            // with your LoginController
            success: function(data){
               console.log(data);
               exit;
               if (data.status==0) {
                     $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                     });
               }
               // // redirect the user to [another page] if the 
               //    login cred are correct. Remember this is 
               //    communicating with the LoginController which we 
               //    are yet to create
               if(data == 1){
                     window.location.replace(
                     '/'
                     );
               }else if(data == 2){
                  // // Show the user authentication error if the 
                  // login cred are invalid. Remember this is 
                  // communicating with the LoginController which we 
                  // are yet to create
                     $("#show_error").hide().html("Invalid login details");
               }
            }
         })

   });


</script>
</div>
@section('js')
@show
</body>
</html>