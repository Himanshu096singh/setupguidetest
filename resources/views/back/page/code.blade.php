@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle pink_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">Code Settings</h3>
                  </div>
               </div>
            </div>
            <div class="white_card_body">
               <div class="white_box_tittle list_header">
                  <h4>Add Code</h4>
               </div>
               <hr>
               <div class="card-body">
                  <form method="post" action="{{route('admin.savecode')}}">
                     @csrf
                     <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="header">Header Code</label>
                                <textarea class="form-control"  rows="3" name="header" id="maxlength-textarea">{{old('header',isset($code->header)?$code->header:'')}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="footer">Footer Code</label>
                                <textarea class="form-control"  rows="3" name="footer" id="maxlength-textarea">{{old('footer',isset($code->footer)?$code->footer:'')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button> <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Back</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12"></div>
   </div>
</div>
</div>
@stop
