@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle pink_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">How To Setup (Update) </h3>
                     
                  </div>
                  
               </div>
            </div>
            <div class="white_card_body">
                <div class="white_box_tittle list_header">
                    <h4>Edit Product Setup</h4>
                    <div class="box_right d-flex lms_block">
                       <div class="add_button ms-2">
                          <a href="{{route('admin.setup.index')}}" class="btn_1"><i class="fas fa-plus f_s_14 me-2"></i> View Product Setups </a>
                       </div>
                    </div>
                 </div>
                <hr>
               <div class="card-body">
                  <form method="post" action="{{route('admin.setup.update',$setup->id)}}" enctype='multipart/form-data'> 
                    @csrf
                    @method('PATCH')
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="title">Product Setup Title</label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="Name" value="{{old('title',$setup->title)}}" placeholder="Setup Title">
                           @error('title')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="slug">Setup Slug* </label>
                           <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug',$setup->slug)}}" placeholder="Category Slug" >
                           @error('slug')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="file">Image*</label>
                            <img src="{{url($setup->image)}}" width="120px" class="image-responsive">
                            <input type="hidden" name="oldimage" value="{{$setup->image}}">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file" value="{{ old('image', $setup->image) }}" placeholder="file">
                            @error('image')  <p class="text-danger">{{ $message }} </p> @enderror
                        <div class="mt-3">
                                <label class="form-label" for="alt">Alt*</label>
                                <input type="text" name="alt" class="form-control @error('alt') is-invalid @enderror" id="alt" value="{{old('alt',$setup->alt)}}" placeholder="Image Alt" >
                                @error('alt')  <p class="text-danger">{{ $message }} </p> @enderror
                            </div>
                        
                        </div>
                        <div class="col-md-6">
                            <div class="form-label col-sm-1 pt-0">Status*</div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="active" @if($setup->status == 1) {{"checked"}} @endif value="1" >
                                <label class="form-label form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="deactive" value="0" @if($setup->status == 0) {{"checked"}} @endif>
                                <label class="form-label form-check-label" for="deactive">Deactive</label>
                            </div>
                    
                        </div>
                     </div>

                    
                    <div class="row mb-3">
                        <h4>Description</h4>
                        <hr class="mt-3">
                        <div class="col-md-12">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description">{{old('description',$setup->description)}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <h4>Prerequisite</h4>
                        <hr class="mt-3">
                        <div class="col-md-12">
                            <label class="form-label" for="prerequisite">Prerequisite</label>
                            <textarea class="form-control summernote" rows="3" name="prerequisite" id="prerequisite" placeholder="Prerequisite">{{old('prerequisite',$setup->prerequisite)}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <h4>How To Install</h4>
                        <hr class="mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="windows">Windows</label>
                            <textarea class="form-control summernote" rows="3" name="windows" id="windows" placeholder="windows">{{old('windows',$setup->window)}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="mac">Mac</label>
                            <textarea class="form-control summernote" rows="3" name="mac" id="mac" placeholder="mac">{{old('mac',$setup->mac)}}</textarea>
                        </div>
                    </div>



                    <div class="row mb-3">
                        <h4>Meta Information</h4>
                        <hr class="mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Meta Title*</label>
                                <input type="text" name="metatitle" class="form-control @error('metatitle') is-invalid @enderror" value="{{old('metatitle', $setup->metatitle)}}" id="metatitle" placeholder="Meta Title">
                                @error('metatitle')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>    
                            <div class="mb-3">
                                 <label class="form-label" for="metakeywords">Meta Keywords*</label>
                                 <input type="text" name="metakeywords" class="form-control @error('metakeywords') is-invalid @enderror" value="{{old('metakeywords', $setup->metakeywords)}}" id="metakeywords" placeholder="Meta Keywords">
                                 @error('metakeywords')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>  
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="metakeywords">Meta Description*</label>
                            <textarea class="form-control @error('metadescription') is-invalid @enderror" maxlength="300" rows="3" name="metadescription" id="maxlength-textarea" placeholder="This textarea has a limit of 300 chars." spellcheck="false">{{old('metadescription', $setup->metadescription)}}</textarea>
                            @error('metadescription')  <p class="text-danger">{{ $message }} </p> @enderror
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

@section('js')
<script src="https://cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('imageupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    $(document).ready(function() {
        $('.summernote').summernote();
    });
 </script>
@endsection