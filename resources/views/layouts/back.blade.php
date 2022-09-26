<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>Marketing</title>
      <link rel="icon" href="{{asset('back/img/logo.png')}}" type="image/png">
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      >
      <link rel="stylesheet" href="{{asset('back/vendors/themefy_icon/themify-icons.css')}}" />
      <link rel="stylesheet" href="{{asset('back/vendors/font_awesome/css/all.min.css')}}" />
      <link rel="stylesheet" href="{{asset('back/vendors/scroll/scrollable.css')}}" />
      <link rel="stylesheet" href="{{asset('back/css/metisMenu.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
      <link rel="stylesheet" href="{{asset('back/css/style1.css')}}" />
      <meta name="_token" content="{{ csrf_token() }}" />
      
      <style>.form-label{font-weight:bold;}
         .form-control.is-invalid{border-color: #ff001b;background: #fff2f2;}
         .table td, .table th {vertical-align: middle;}
         .form-select.is-invalid:not([multiple]):not([size]){background-image:none !important;}
         .badge {padding: 7px;font-size: 11px;margin-right: 5px;}
         .modal-backdrop{width:auto !important;height:auto !important;}
      </style>
   </head>
   <body class="crm_body_bg">
      @include('layouts.back.sidebar')
      @include('layouts.back.header')
      @yield('content')
      @include('layouts.back.footer')
    </body>
</html>