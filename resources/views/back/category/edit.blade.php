@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0">Update Category </h3>
                  </div>
               </div>
            </div>
            <div class="white_card_body">
               <div class="card-body">
                  <form action="{{route('admin.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="Name">Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" id="Name" value="{{$category->name}}" placeholder="Category Name" name="name">
                           @error('name')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="slug">Slug</label>
                           <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{$category->slug}}" placeholder="Category Slug" name="slug">
                           @error('slug')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                           
                           <input type="hidden" name="oldimage" value="{{$category->image}}">
                           
                           <label class="form-label" for="file">Image</label>
                           <img src="{{asset($category->image)}}" class="img-responsive" width="160px"/>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file" placeholder="file" >
                           @error('image')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div> 
                        <div class="col-md-6">
                           <input type="hidden" name="oldicon" value="{{$category->icon}}">
                           <label class="form-label" for="icon">Icon</label>
                           <img src="{{asset($category->icon)}}" class="img-responsive" width="90px"/>
                           <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" id="icon" placeholder="file" >
                           @error('icon')  <p class="text-danger">{{ $message }} </p> @enderror
                           

                           <label class="form-label" for="alt">Alt</label>
                           <input type="text" class="form-control @error('alt') is-invalid @enderror" name="alt" id="alt" value="{{$category->alt}}" placeholder="Image Alt" >
                           @error('alt')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     <fieldset class="mb-3">
                        <div class="row">
                            <div class="form-label col-sm-1 pt-0">Status</div>
                                <div class="col-sm-11">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1" @if($category->status == 1) {{"checked"}} @endif>
                                        <label class="form-label form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="deactive" value="0"  @if($category->status == 0) {{"checked"}} @endif>
                                        <label class="form-label form-check-label" for="deactive">Deactive</label>
                                    </div>
                            
                                </div>
                            </div>
                    </fieldset>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Meta Title</label>
                                <input type="text" name="metatitle" class="form-control @error('metatitle') is-invalid @enderror" id="metatitle"  value="{{$category->metatitle}}"  placeholder="Meta Title">
                                @error('metatitle')  <p class="text-danger">{{ $message }} </p> @enderror
                            </div>    
                            <div class="mb-3">
                                <label class="form-label" for="metakeywords">Meta Keywords</label>
                           <input type="text" name="metakeywords" class="form-control @error('metatitle') is-invalid @enderror" id="metakeywords"  value="{{$category->metakeywords}}"  placeholder="Meta Keywords">
                           @error('metakeywords')  <p class="text-danger">{{ $message }} </p> @enderror
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="metadescription">Meta Description</label>
                            <textarea class="form-control @error('metatitle') is-invalid @enderror" maxlength="300" rows="3" name="metadescription" id="metadescription" placeholder="This textarea has a limit of 300 chars." spellcheck="false">{{$category->metadescription}}</textarea>
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
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle blue_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">Company list For {{ucwords($category->name)}}</h3>
                  </div>
               </div>
            </div>
            <div class="white_card_body">
               <div class="table-responsive m-b-30">
                  <table class="table table-striped">
                     <thead class="table-dark">
                        <tr>
                           <th scope="col">Sr.No.</th>
                           <th scope="col">Name</th>
                           <th scope="col">Slug</th>
                           <th scope="col">Status</th>
                           <th scope="col">No. of FAQ</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody class="">
                         @foreach($category->companies as $index=>$list)
                         <tr >
                            <td>{{$index+1}}</td>
                             <td>{{$list->name}}</td>
                             <td>{{$list->slug}}</td>
                            <td>
                                @if($list->status == 1)
                                   <span class="badge bg-success">Active</span>
                                @else
                                   <span class="badge bg-danger">De-active</span>
                                @endif
                             </td>
                             <td><span class="badge bg-danger"> {{count($list->faqs)}}</span></td>
                             @php $eid = Crypt::encryptString($list->id); @endphp
                             <td>
                                <a href="{{ route('admin.company.edit',$eid) }}" type="button" class="btn mb-3 btn-primary"><i class="fas fa-edit"></i></a> 
   
                                   <form action="{{ route('admin.company.destroy', $eid) }}" method="POST" style="display:inline" id="form1" style="display: inline;">
                                      <input type="hidden" name="_method" value="DELETE">
                                      <input type="hidden" name="routename" value="{{Route::currentRouteName()}}">
                                      @csrf
                                      <button type="submit" class="btn mb-3 btn-danger show_confirm"   ><i class="fas fa-trash "></i></button>
                                   </form>
                             
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                  </table>
           
               </div>
            </div>
         </div>
   
      </div>
      <div class="col-12"></div>
   </div>
</div>
</div>
@stop