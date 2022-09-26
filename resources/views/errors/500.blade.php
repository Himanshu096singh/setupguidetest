@extends('layouts.error')
@section('content')
<div class="erroe_page_wrapper">
   <div class="errow_wrap">
      <div class="container text-center">
         <img src="img/bak_hovers/sad.png" alt="">
         <div class="error_heading  text-center">
            <h3 class="headline font-danger theme_color_1">500</h3>
         </div>
         <div class="col-md-8 offset-md-2 text-center">
            <p>Server Error</p>
         </div>
         <div class="error_btn  text-center">
            <a class=" default_btn theme_bg_1 " href="{{url('/')}}">Back Home</a>
         </div>
      </div>
   </div>
</div>
@endsection