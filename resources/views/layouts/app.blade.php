<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link rel="icon" href="{{asset('back/img/logo.png')}}" type="image/png">

       <link rel="stylesheet" href="{{asset('back/css/bootstrap1.min.css')}}" />
       <link rel="stylesheet" href="{{asset('back/vendors/themefy_icon/themify-icons.css')}}" />
       <link rel="stylesheet" href="{{asset('back/vendors/font_awesome/css/all.min.css')}}" />
       <link rel="stylesheet" href="{{asset('back/vendors/scroll/scrollable.css')}}" />
       <link rel="stylesheet" href="{{asset('back/css/metisMenu.css')}}">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
       <link rel="stylesheet" href="{{asset('back/css/style1.css')}}" />
       <meta name="_token" content="{{ csrf_token() }}" />
      
      <style>
         .form-label{font-weight:bold;}
         .form-control.is-invalid{border-color: #ff001b;background: #fff2f2;}
         .table td, .table th {vertical-align: middle;}
         .form-select.is-invalid:not([multiple]):not([size]){background-image:none !important;}
         .badge {padding: 7px;font-size: 11px;margin-right: 5px;}
         .modal-backdrop{width:auto !important;height:auto !important;}
      </style>
      @section('css')
      @show
   </head>
   <body class="crm_body_bg"  style="background-image: url(assets/img/home-banner.jpg);
   background-size: 100%;
   background-repeat: no-repeat;" > 
      @yield('content')

    </body>
</html>