<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>{{ config('app.name') }}</title>
      <link rel="stylesheet" href="{{asset('admin/css/bootstrap1.min.css')}}" />
      <link rel="stylesheet" href="{{asset('admin/css/style1.css')}}" />
      <link rel="stylesheet" href="{{asset('admin/css/colors/default.css')}}" id="colorSkinCSS">
   </head>
   <body class="crm_body_bg">
      @yield('content')
    </body>
</html>