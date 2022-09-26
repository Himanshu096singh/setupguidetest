@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle pink_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">Post(Blog) </h3>
                     
                  </div>
                  
               </div>
            </div>
            <div class="white_card_body">
                <div class="white_box_tittle list_header">
                    <h4>Edit Posts</h4>
                    <div class="box_right d-flex lms_block">
                       <div class="add_button ms-2">
                          <a href="{{route('admin.posts.index')}}" class="btn_1"><i class="fas fa-plus f_s_14 me-2"></i> View Posts </a>
                       </div>
                    </div>
                 </div>
                <hr>
               <div class="card-body">
                  <form method="post" action="{{route('admin.posts.update',$post->id)}}" enctype='multipart/form-data'> 
                    @csrf
                    @method('PATCH')
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="title">Title*</label>
                           <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title',$post->title)}}" placeholder="Post Title">
                           @error('title')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="slug">Slug* </label>
                           <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug',$post->slug)}}" placeholder="Post Slug">
                           @error('slug')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-4">
                           <label class="form-label" for="category">Category*</label>
                           <select class="form-select form-control @error('category') is-invalid @enderror" name="category" id="category">
                                <option value="">Select Category</option>
                                 @foreach($category as $list)
                                    <option value="{{$list->id}}" @if($post->category_id == $list->id) {{"selected"}} @endif>{{$list->name}}</option>
                                 @endforeach
                           </select>
                           @error('category')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-4">
                           <label class="form-label" for="company">Company</label>
                           <select class="form-select form-control" name="company" id="company">
                              {{-- <option value="">Select Company</option> --}}
                              @if($post->company_id != null && $post->company_id!='')
                                 <option value="{{$post->company->id}}">{{$post->company->name}}</option>
                              @endif
                           </select>
                        </div>
                        <div class="col-md-4">
                           <label class="form-label" for="product">Product</label>
                           <select class="form-select form-control" name="product" id="product">
                              @if($post->product_id != null && $post->product_id!='')
                                 <option value="{{$post->product->id}}">{{$post->product->name}}</option>
                              @endif
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="file">Image*</label>
                           <input type="hidden" value="{{$post->image}}" name="oldimage">
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file" value="{{old('image')}}" placeholder="file">
                           @error('image')  <p class="text-danger">{{ $message }} </p> @enderror
                           <img src="{{url($post->image)}}" style="padding:6px;width:120px">
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="alt">Alt*</label>
                           <input type="text" name="alt" class="form-control @error('alt') is-invalid @enderror" id="alt" value="{{old('alt', $post->alt)}}" placeholder="Image Alt" >
                           @error('alt')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <div class="form-label col-sm-1 pt-0">Status*</div>
                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="status" id="active" value="1" @if($post->status == 1) {{"checked"}} @endif >
                               <label class="form-label form-check-label" for="active">Active</label>
                           </div>
                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="status" id="deactive" value="0" @if($post->status == 0) {{"checked"}} @endif >
                               <label class="form-label form-check-label" for="deactive">Deactive</label>
                           </div>
                   
                       </div>
                     </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description" id="editor" placeholder="Description">{{old('description', $post->description)}}</textarea>@error('description')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <h4>Meta Information</h4>
                        <hr class="mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Meta Title*</label>
                                <input type="text" name="metatitle" class="form-control @error('metatitle') is-invalid @enderror" value="{{old('metatitle', $post->metatitle)}}" id="metatitle" placeholder="Meta Title">
                                @error('metatitle')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>    
                            <div class="mb-3">
                                 <label class="form-label" for="metakeywords">Meta Keywords*</label>
                                 <input type="text" name="metakeywords" class="form-control @error('metakeywords') is-invalid @enderror" value="{{old('metakeywords', $post->metakeywords)}}" id="metakeywords" placeholder="Meta Keywords">
                                 @error('metakeywords')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>  
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="metakeywords">Meta Description*</label>
                            <textarea class="form-control @error('metadescription') is-invalid @enderror" maxlength="300" rows="3" name="metadescription" id="maxlength-textarea" placeholder="This textarea has a limit of 300 chars." spellcheck="false">{{old('metadescription',$post->metadescription)}}</textarea>
                            @error('metadescription')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h4>Tags</h4> 
                        <hr class="mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="tag">Tags</label>
                            @foreach($post->tags as $list)
                            <span class="badge bg-primary">{{ucwords($list->name)}} </span>
                        @endforeach
                            <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" id="tag" value="@foreach($post->tags as $list){{ucwords($list->name)}},@endforeach" placeholder="Tags" >
                            @error('tag')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                    </div>
                   {{-- {{ $post->tags }} --}}
                    

                    <button type="submit" class="btn btn-success">Submit</button> <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Back</a>
                  </form>
               </div>
            </div>
         </div>

      </div>
      <div class="col-12"></div>
   </div>


   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle pink_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">Post FAQ For {{ucwords($post->title)}}</h3>
                     
                  </div>
                  
               </div>
            </div>
            <div class="white_card_body">
               
               <div class="card-body">
                  <form action="{{route('admin.posts.faq')}}" method="post">
                     @php
                        $eid = Crypt::encryptString($post->id); 
                     @endphp
                     <input type="hidden" value="{{$eid}}" name="postid">
                     @csrf
                     @foreach($post->faq as $faqs)
                        <div class="repeatable ">
                           <div class="row">
                              <div class="col-sm-10">
                                 <div class="mb-3 row">
                                    <label for="question" class="form-label col-sm-3 col-form-label">Question. </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="question[]" class="form-control" id="question" placeholder="Question" value="{{$faqs->question}}" required="">
                                    </div>
                                 </div>
                                 <div class="mb-3 row">
                                    <label for="answer" class="form-label col-sm-3 col-form-label">Answer. </label>
                                    <div class="col-sm-9">
                                       <textarea name="answer[]" class="form-control summernote" id="mytextarea" placeholder="Answer" required="">{{$faqs->answer}}</textarea>
                                    </div>
                                 </div>
                                 
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check"><input type="button" id="removeRow" class="btn btn-danger" value="x"></div>
                              </div>
                              
                           </div>
                        </div>
                     @endforeach   
                     <div id="newRow"></div>
                     <div class="row mb-3">
                        <div class="col-sm-12">
                           <input type="button" id="addRow" class="btn btn-info" value="Add Question"> 
                        </div>
                     </div>
                     <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                     </div>
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
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('imageupload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
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
                  output += '<option value= "">Select Option</option>';
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
                  $("#product").empty();
                  $("#product").append(output);
               
               }
            }
         });
      });
   });
   
      $('#company').change(function(e){
         e.preventDefault();
            $.ajaxSetup({
               headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               }
            });
         let value = $('#company').val();
         let _token = $("input[name=_token]").val();
         console.log(value);
         $.ajax({
         type: "POST",
         url: "{{url('admin/getproduct')}}",
         data: {_token:_token,values: value},
         success:function(data){
            console.log(data);
            let output = '';
               product = data.products;
               console.log(product);
               if(product.length > 0){
                  output += '<option value= "">Select Option</option>';
                  for(let i=0; i<product.length; i++){
                     output += '<option value= "'+ product[i].id +'">' + product[i].name +'</option>';
                  }
                  console.log(output);
                  $("#product").empty();
                  $('#product').append(output);
               } else {
                  output = "<option value=''> No Data Found </option>";
                  $("#product").empty();
                  $('#product').append(output);
               }
         }
         });
      });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script type="text/javascript">
   $("#addRow").click(function () {
       var html = '';
       html += '<div class="repeatable "><div class="row"><div class="col-sm-10"><div class="mb-3 row"><label for="question" class="form-label col-sm-3 col-form-label">Question. </label><div class="col-sm-9"><input type="text" name="question[]" class="form-control" id="question" placeholder="Question" required=""></div></div><div class="mb-3 row"><label for="answer" class="form-label col-sm-3 col-form-label">Answer. </label><div class="col-sm-9"><textarea name="answer[]" class="form-control summernote" id="answer" placeholder="Answer" required=""></textarea></div></div></div><div class="col-sm-2"><div class="form-check"><input type="button" id="removeRow" class="btn btn-danger" value="x"></div></div></div></div>';
       $('#newRow').append(html);
       $('.summernote').summernote();
   });
   
   // remove row
   $(document).on('click', '#removeRow', function () {
       $(this).closest('.repeatable').remove();
   });
</script>
<script>
   $(document).ready(function() {
   $('.summernote').summernote();
 });
 </script>
@endsection