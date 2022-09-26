<div class="footer_part">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
             <div class="footer_iner text-center">
                <p>{{date('Y')}} © {{config('app.name')}} - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Zonewebsites</a></p>
             </div>
          </div>
       </div>
    </div>
 </div>
</section>

<div id="back-top" style="display: none;">
 <a title="Go to Top" href="#">
 <i class="ti-angle-up"></i>
 </a>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="{{asset('back/js/metisMenu.js')}}"></script>
<script src="{{asset('back/js/custom.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
   @if(Session::has('error'))
     toastr.error("{{ Session::get('error') }}");
   @elseif(Session::has('success'))
     toastr.success("{{ Session::get('success') }}");
  @endif
 </script>
@section('js')
@show

