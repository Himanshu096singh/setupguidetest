@extends('layouts.back')
@section('content')

<div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle pink_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">Product </h3>
                     
                  </div>
                  
               </div>
            </div>
            <div class="white_card_body">
                <div class="white_box_tittle list_header">
                    <h4>Add Product</h4>
                    <div class="box_right d-flex lms_block">
                       <div class="add_button ms-2">
                          <a href="{{route('admin.product.index')}}" class="btn_1"><i class="fas fa-plus f_s_14 me-2"></i> Products Lists </a>
                       </div>
                    </div>
                 </div>
                <hr>
               <div class="card-body">
                  <form method="post" action="{{route('admin.product.store')}}" enctype='multipart/form-data'> 
                    @csrf
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="Name">Product Name*</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="Name" value="{{old('name')}}" placeholder="Category Name">
                           @error('name')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="slug">Product Slug* </label>
                           <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}" placeholder="Category Slug" >
                           @error('slug')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="category">Category*</label>
                           <select class="form-select form-control @error('category') is-invalid @enderror" name="category" id="category">
                                <option value="">Select Category</option>
                                @foreach($category as $list)
                                    <option value="{{$list->id}}" @if(old('category') == $list->id) {{"selected"}} @endif>{{$list->name}}</option>
                                @endforeach
                           </select>
                           @error('category')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="company">Company*</label>
                            <select class="form-select form-control @error('company') is-invalid @enderror" name="company" id="company">
                                 <option value="">Select Company</option>
                                 {{-- @foreach($company as $list)
                                     <option value="{{$list->id}}" @if(old('company') == $list->id) {{"selected"}} @endif>{{$list->name}}</option>
                                 @endforeach --}}
                            </select>
                            @error('company')  <p class="text-danger">{{ $message }} </p> @enderror
                         </div>

                        
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="file">Image*</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file" value="{{old('image')}}" placeholder="file">
                            @error('image')  <p class="text-danger">{{ $message }} </p> @enderror
                         </div>
                        <div class="col-md-6">
                           <label class="form-label" for="alt">Alt*</label>
                           <input type="text" name="alt" class="form-control @error('alt') is-invalid @enderror" id="alt" value="{{old('alt')}}" placeholder="Image Alt" >
                           @error('alt')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                    </div>

                    <div class="row  mb-3">
                        <div class="col-md-6">
                            <div class="form-label col-sm-1 pt-0">Status*</div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="active" value="1" >
                                <label class="form-label form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="deactive" value="0" checked="">
                                <label class="form-label form-check-label" for="deactive">Deactive</label>
                            </div>
                    
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="description">Description</label>
                            <textarea id="editor" class="form-control" rows="3" name="description" id="description" placeholder="Description">{{old('description')}}</textarea>
                        </div>
                    </div>    

                    <div class="row mb-3">
                        <h4>Meta Information</h4>
                        <hr class="mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Meta Title*</label>
                                <input type="text" name="metatitle" class="form-control @error('metatitle') is-invalid @enderror" value="{{old('metatitle')}}" id="metatitle" placeholder="Meta Title">
                                @error('metatitle')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>    
                            <div class="mb-3">
                                 <label class="form-label" for="metakeywords">Meta Keywords*</label>
                                 <input type="text" name="metakeywords" class="form-control @error('metakeywords') is-invalid @enderror" value="{{old('metakeywords')}}" id="metakeywords" placeholder="Meta Keywords">
                                 @error('metakeywords')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>  
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="metakeywords">Meta Description*</label>
                            <textarea class="form-control @error('metadescription') is-invalid @enderror" maxlength="300" rows="3" name="metadescription" id="maxlength-textarea" placeholder="This textarea has a limit of 300 chars." spellcheck="false">{{old('metadescription')}}</textarea>
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
<script>
   
    $(document).ready(function(){
        $('#category').change(function(e){
         e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
      let value = $('#category').val();
      let _token = $("input[name=_token]").val();
        console.log(value);
        $.ajax({
        type: "POST",
        url: "{{url('admin/getcompany')}}",
        data: {_token:_token,values: value},
        success:function(data){
            let output = '';
            company = data.companies;
            console.log(company);
            if(company.length > 0){
               for(let i=0; i<company.length; i++){
                  output += '<option value= "'+ company[i].id +'">' + company[i].name +'</option>';
               }
               console.log(output);
               $("#company").empty();
               $('#company').append(output);
            } else {
               output = "<option value=''> No Data Found </option>";
               $("#company").empty();
               $('#company').append(output);
            }
        }
      });
    });
   });
   
</script>
@endsection