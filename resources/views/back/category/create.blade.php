@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0">Category </h3>
                     
                  </div>
                  
               </div>
            </div>
            <div class="white_card_body">
                <div class="white_box_tittle list_header">
                    <h4>Add Category</h4>
                    <div class="box_right d-flex lms_block">
                       <div class="add_button ms-2">
                          <a href="{{route('admin.category.index')}}" class="btn_1"><i class="fas fa-plus f_s_14 me-2"></i> View Category </a>
                       </div>
                    </div>
                 </div>
               <div class="card-body">
                  <form method="post" action="{{route('admin.category.store')}}" enctype='multipart/form-data'> 
                    @csrf
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="Name">Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="Name" value="{{old('name')}}" placeholder="Category Name">
                           @error('name')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="slug">Slug</label>
                           <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}" placeholder="Category Slug" >
                           @error('slug')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="file">Image</label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file" value="{{old('image')}}" placeholder="file">
                           @error('image')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="file">Icon</label>
                           <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" id="file" value="{{old('icon')}}" placeholder="file">
                           @error('icon')  <p class="text-danger">{{ $message }} </p> @enderror

                           <label class="form-label" for="alt">Alt</label>
                           <input type="text" name="alt" class="form-control @error('alt') is-invalid @enderror" id="alt" value="{{old('alt')}}" placeholder="Image Alt" >
                           @error('alt')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     
                     <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Meta Title</label>
                                <input type="text" name="metatitle" class="form-control @error('metatitle') is-invalid @enderror" value="{{old('metatitle')}}" id="metatitle" placeholder="Meta Title">
                                @error('metatitle')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>    
                            <div class="mb-3">
                                 <label class="form-label" for="metakeywords">Meta Keywords</label>
                                 <input type="text" name="metakeywords" class="form-control @error('metakeywords') is-invalid @enderror" value="{{old('metakeywords')}}" id="metakeywords" placeholder="Meta Keywords">
                                 @error('metakeywords')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>  
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="metakeywords">Meta Description</label>
                            <textarea class="form-control @error('metadescription') is-invalid @enderror" maxlength="300" rows="3" name="metadescription" id="maxlength-textarea" placeholder="This textarea has a limit of 300 chars." spellcheck="false">{{old('metadescription')}}</textarea>
                            @error('metadescription')  <p class="text-danger">{{ $message }} </p> @enderror
                           </div>
                     </div>
                     <fieldset class="mb-3">
                        <div class="row">
                            <div class="form-label col-sm-1 pt-0">Status</div>
                                <div class="col-sm-11">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1" >
                                        <label class="form-label form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="deactive" value="0" checked="">
                                        <label class="form-label form-check-label" for="deactive">Deactive</label>
                                    </div>
                            
                                </div>
                            </div>
                    </fieldset>
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