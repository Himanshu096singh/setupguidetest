@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
   .crm_body_bg{background-size:cover !important;background:#0f5298 !important;}
   #togglePassword {
   position: relative;
   left: 424px;
   top: -29px;
   font-size: 20px;
   color: black;
   } 
   .btn_1 {    width: 81%;
   line-height: 10px !important;
   /* background-color: #14256a; */
   /* border: 1px solid #14256a; */
   color: #fff!important;
   display: inline-block;
   padding: 16px 106px!important;
   background: #0f5298 !important;
   text-transform: capitalize;
   line-height: 16px!important;
   font-size: 17px!important;
   border: none;
   font-weight: 500;
   border-radius: 5px;
   white-space: nowrap;
   -webkit-transition: .5s;
   transition: .5s;}
   .wrapper {
   margin: 0 auto;
   width: 100%;
   max-width: 1162px;
   min-height: 100vh;
   position: absolute;
   display: flex;
   height: 332px !important;
   align-items: center;
   justify-content: center;
   flex-direction: column;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   }
   .col-left{background-image:url('https://media.istockphoto.com/vectors/login-page-on-laptop-screen-notebook-and-online-login-form-sign-in-vector-id1135341047?k=20&m=1135341047&s=612x612&w=0&h=ai30N4N8VC_uylITs2bWfJ0k3GzbWn-q0nR664tj0tk=');width:100%;background-position:center center;    background-repeat: no-repeat;    filter: brightness(0.9); background-size:cover;}
   .col-right{background-color: #f5f5f5;}
   .container {
   position: relative;
   width: 100%;
   max-width: 600px;
   height: auto;
   display: flex;
   }
   .credit {
   position: relative;
   margin: 25px auto 0 auto;
   width: 100%;
   text-align: center;
   color: #666666;
   font-size: 16px;
   font-weight: 400;
   }
   .credit a {
   color: #222222;
   font-size: 16px;
   font-weight: 600;
   }
   /* * * * * Login Form CSS * * * * */
   h2 {
   margin: 0 0 15px 0;
   font-size: 30px;
   font-weight: 700;
   }
   h2 img {
   width: 120px;
   }
   p {
   margin: 0 0 20px 0;
   font-size: 16px;
   font-weight: 500;
   line-height: 22px;
   }
   .btn {
   display: inline-block;
   padding: 7px 20px;
   font-size: 16px;
   letter-spacing: 1px;
   text-decoration: none;
   border-radius: 5px;
   color: #ffffff;
   outline: none;
   border: 1px solid #ffffff;
   transition: .3s;
   -webkit-transition: .3s;
   }
   .btn:hover {
   color: #4CAF50;
   background: #ffffff;
   }
   .col-left,
   .col-right {
   width: 55%;
   padding: 100px 35px;
   display: flex;
   }
   .col-left {position: relative;
   left: 10px;
   width: 45%;
   -webkit-clip-path: polygon(98% 17%, 100% 34%, 98% 51%, 100% 68%, 98% 84%, 100% 100%, 0 100%, 0 0, 100% 0);
   clip-path: polygon(98% 17%, 100% 34%, 98% 51%, 100% 68%, 98% 84%, 100% 100%, 0 100%, 0 0, 100% 0);
   }
   @media(max-width: 575.98px) {
   .container {
   flex-direction: column;
   box-shadow: none;
   }
   .col-left,
   .col-right {
   width: 100%;
   margin: 0;
   padding: 30px;
   -webkit-clip-path: none;
   clip-path: none;
   }
   }
   .login-text {
   position: relative;
   width: 100%;
   color: #ffffff;
   text-align: center;
   }
   .login-form {
   position: relative;
   width: 100%;
   color: #666666;
   }
   .login-form p:last-child {
   margin: 0;
   }
   .login-form p a {
   color: #0f5298;
   font-size: 16px;
   margin-left: 47px;
   margin-bottom: 100px;
   font-weight: 600;
   text-decoration: none;
   }
   .login-form p:last-child a:last-child {
   float: right;
   }
   .login-form label {
   display: block;
   width: 100%;
   margin-bottom: 2px;
   letter-spacing: .5px;
   }
   .login-form p:last-child label {
   width: 60%;
   float: left;
   }
   .login-form label span {
   color: #ff574e;
   padding-left: 2px;
   }
   .login-form input {
   display: block;
   width: 82%;
   height: 40px;
   padding: 0 10px;
   font-size: 16px;
   margin: auto;
   letter-spacing: 1px;
   outline: none;
   border: 1px solid #cccccc;
   border-radius: 5px;
   }
   .login-form input:focus {
   border-color: #0f5298;
   }
   .login-form input.btn {
   color: #ffffff;
   background: #0f5298;
   border-color: #0f5298;
   outline: none;
   cursor: pointer;height: 52px;
   }
   .login-form input.btn:hover {
   color: #4CAF50;
   background: #ffffff;
   }
   @media only screen and (max-width: 768px) {
   .col-left {
   position: relative;
   left: 7px;
   display: none;}
   }
   .bgss{ background-color: #f5f5f5;}
   .field-icon {
   float: right;
   margin-left: -25px;
   margin-top: -25px;
   position: relative;
   z-index: 2;
   }
</style>
@section('content')
<div class="container-fluid  ">
   <div class="row">
      <div class="col-md-12 text-center bgss p-3">
         <img src="https://setupguidebook.com/beta2/public/upload/settings/62ceb4ecc7db2_logo.png" width="200">
      </div>
   </div>
</div>
<div class="wrapper">
   <div class="container">
      <div class="col-left col-md-6">
         <div class="login-text">
         </div>
      </div>
      <div class="col-right col-md-6">
         <div class="login-form">
            <h2 class="text-center mb-5">Login</h2>
            <form method="POST" action="{{ route('login') }}">
               @csrf
               <div class="">
                  <!--<label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>-->
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="mt-4">
                  <!--<label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>-->
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" >
                  <i class="bi bi-eye-slash" id="togglePassword"></i> 
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <div class="row mb-3">
                  </div>
               </div>
               <p>
                  <a class="form-recovery" href="#">Forgot Password?</a>
               </p>
               <div class="d-flex justify-content-center mt-4">
                  <button type="submit" class="btn_1 full_width text-center">
                  {{ __('Login') }}
                  </button>
               </div>
               {{-- 
               <p>Need an account? <a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="#"> Sign Up</a></p>
               <div class="text-center">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
               </div>
               --}}
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
