@extends('layouts.front')
@section('content')
<!-- Main Banner Section Start -->
<div class="banner dark-opacity category-page" style="background-image:url({{asset('assets/img/aboutbanner.jpg')}});" data-overlay="8">
   <div class="container">
      <div class="banner-caption">
         <div class="col-md-12 col-sm-12 banner-text">
            <h1>About Us</h1>
            <h2>Is An Open Community</h2>
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
      <span class="current">About Us</span>
   </div>
</div>
<div class="clearfix"></div>
<section class="about">
   <div class="container">
      <!-- our history -->  
      <div class="row detail-wrapper" >
         <div class="col-md-12">
            <div class="detail-wrapper-header">
               <h2>About Us</h2>
            </div>
         </div>
         <div class="col-md-6">
            <div class="detail-wrapper-body" style="padding-top:8em">
               <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
               <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
            </div>
         </div>
         <div class="col-md-6">
            <img src="{{asset('assets/img/blog/blog-3.jpg')}}" class="img-responsive" alt="">
         </div>
      </div>
      <!-- end our history -->
   </div>
</section>
<!-- 
   <section class="pricing padd-bot-40 padd-top-40">
       <div class="container">
           <h2 class="text-center">Our Subscription Plan </h2>
           <div class="col-md-4 col-sm-4">
               <div class="package-box">
                   <div class="package-header">
                       <i class="fa fa-cog" aria-hidden="true"></i>
                       <h3>One Time Fix</h3>
                   </div>
                   <div class="package-price">
                       <h2><sup>$ </sup>20<sub> </sub></h2>
                   </div>
                   <div class="package-info">
                       <ul>
                       <li>3 Video Support</li>
                       <li>3 Chat Support</li>
                       <li>4 Install Option</li>
                       <li>Full voice Support</li>
                       </ul>
                   </div>
                   <button type="submit" class="btn btn-package" data-toggle="modal" data-target="#myModal">Sign Up</button>
               </div>
           </div>
           
           <div class="col-md-4 col-sm-4">
               <div class="active package-box">
                   <div class="package-header">
                       <i class="fa fa-star-half-o" aria-hidden="true"></i>
                       <h3>1 Year Subscription </h3>
                   </div>
                   <div class="package-price">
                       <h2><sup>$ </sup>99<sub>/Year</sub></h2>
                   </div>
                   <div class="package-info">
                       <ul>
                       <li>unlimited Video Support</li>
                       <li>unlimited Chat Support</li>
                       <li>12 Install Option</li>
                       <li>Full voice Support</li>
                       </ul>
                   </div>
                   <button type="submit" class="btn btn-package" data-toggle="modal" data-target="#myModal">Sign Up</button>
               </div>
           </div>
           
           <div class="col-md-4 col-sm-4">
               <div class="package-box">
                   <div class="package-header">
                       <i class="fa fa-cube" aria-hidden="true"></i>
                       <h3>1 Year Subscription</h3>
                   </div>
                   <div class="package-price">
                       <h2><sup>$ </sup>199<sub>/Year</sub></h2>
                   </div>
                   <div class="package-info">
                       <ul>
                       <li>unlimited Video Support</li>
                       <li>unlimited Chat Support</li>
                       <li>unlimited Install Option</li>
                       <li>Full voice Support</li>
                       </ul>
                   </div>
                   <button type="submit" class="btn btn-package" data-toggle="modal" data-target="#myModal">Sign Up</button>
               </div>
           </div>
           
       </div>
   </section> -->
<!-- installation Process -->
<section class="install_setup">
   <div class="container">
      <div class="row">
         <div class="col-md-10 col-md-offset-1">
            <div class="heading">
               <h2>
                  Why Choose?
               </h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>
            </div>
         </div>
      </div>
      <div class="row">
         <!--pre requsite  -->
         <div class="col-md-12 col-sm-12">
            <div class="panel-group style-1" id="accordion" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="designing">
                     <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse01" aria-expanded="false" aria-controls="collapse01" class="collapsed">
                        Professional
                        </a>
                     </h4>
                  </div>
                  <div id="collapse01" class="panel-collapse collapse" role="tabpanel" aria-labelledby="designing" aria-expanded="false" style="height: 0px;">
                     <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                        <ul>
                           <li>Lorem Ipsum </li>
                           <li>Lorem Ipsum </li>
                           <li>Lorem Ipsum </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="designing">
                     <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse02" aria-expanded="false" aria-controls="collapse02" class="collapsed">
                        Platform & Tools
                        </a>
                     </h4>
                  </div>
                  <div id="collapse02" class="panel-collapse collapse" role="tabpanel" aria-labelledby="designing" aria-expanded="false" style="height: 0px;">
                     <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                        <ul>
                           <li>Lorem Ipsum </li>
                           <li>Lorem Ipsum </li>
                           <li>Lorem Ipsum </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="designing">
                     <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse03" aria-expanded="false" aria-controls="collapse03" class="collapsed">
                        Support 
                        </a>
                     </h4>
                  </div>
                  <div id="collapse03" class="panel-collapse collapse" role="tabpanel" aria-labelledby="designing" aria-expanded="false" style="height: 0px;">
                     <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                        <ul>
                           <li>Lorem Ipsum </li>
                           <li>Lorem Ipsum </li>
                           <li>Lorem Ipsum </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end pre requisite -->
      </div>
   </div>
</section>
<!-- end installation process -->
@stop
