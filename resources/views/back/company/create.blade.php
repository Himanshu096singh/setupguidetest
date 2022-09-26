@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle pink_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">Company </h3>
                     
                  </div>
                  
               </div>
            </div>
            <div class="white_card_body">
                <div class="white_box_tittle list_header">
                    <h4>Add Company</h4>
                    <div class="box_right d-flex lms_block">
                       <div class="add_button ms-2">
                          <a href="{{route('admin.company.index')}}" class="btn_1"><i class="fas fa-plus f_s_14 me-2"></i> View Company </a>
                       </div>
                    </div>
                 </div>
                <hr>
               <div class="card-body">
                  <form method="post" action="{{route('admin.company.store')}}" enctype='multipart/form-data'> 
                    @csrf
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="Name">Company Name*</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="Name" value="{{old('name')}}" placeholder="Category Name">
                           @error('name')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="slug">Company Slug* </label>
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
                            <label class="form-label" for="file">Image*</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file" value="{{old('image')}}" placeholder="file">
                            @error('image')  <p class="text-danger">{{ $message }} </p> @enderror
                         </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="alt">Alt*</label>
                           <input type="text" name="alt" class="form-control @error('alt') is-invalid @enderror" id="alt" value="{{old('alt')}}" placeholder="Image Alt" >
                           @error('alt')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
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
                     </div>

                    
                    <div class="row mb-3">
                        <h4>Basic Information</h4>
                        <hr class="mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="headquarter">Head Quarter</label>
                                <input type="text" name="headquarter" class="form-control" value="{{old('headquarter')}}" id="headquarter" placeholder="Head Quarter">
                            </div>  
                            <div class="mb-3">
                                <label class="form-label" for="founder">Founder</label>
                                <input type="text" name="founder" class="form-control" value="{{old('founder')}}" id="founder" placeholder="Founder">
                           </div>   
                            <div class="mb-3">
                                 <label class="form-label" for="ceo">CEO</label>
                                 <input type="text" name="ceo" class="form-control" value="{{old('ceo')}}" id="ceo" placeholder="CEO">
                            </div> 
                            
                            <div class="mb-3">
                                <label class="form-label" for="companynumber">Company Number</label>
                                <input type="text" name="companynumber" class="form-control" value="{{old('companynumber')}}" id="companynumber" placeholder="Company Number">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="mosthearedbrand">Most Heared Brand</label>
                                <input type="text" name="mosthearedbrand" class="form-control" value="{{old('mosthearedbrand')}}" id="mosthearedbrand" placeholder="Inception Date">
                            </div> 
                            <div class="mb-3">
                                <label class="form-label" for="insceptiondate">Inception Date</label>
                                <input type="text" name="insceptiondate" class="form-control" value="{{old('insceptiondate')}}" id="insceptiondate" placeholder="Inception Date">
                            </div> 
                            <div class="mb-3">
                                <label class="form-label" for="totalassets">Total Assets</label>
                                <input type="text" name="totalassets" class="form-control" value="{{old('totalassets')}}" id="totalassets" placeholder="Total Assets ">
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="history">History</label>
                            <textarea class="form-control" rows="3" name="history" id="history" placeholder="History">{{old('history')}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <h4>Market Share And Current Stage</h4>
                        <hr class="mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="marketshareimage">Market Share Image</label>
                                <input type="file" name="marketshareimage" class="form-control" id="marketshareimage" value="{{old('marketshareimage')}}" placeholder="Market Share Image">
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="marketsharecontent">Market Share Content</label>
                                <textarea class="form-control" rows="3" name="marketsharecontent" id="maxlength-textarea" placeholder="Market Share">{{old('marketsharecontent')}}</textarea>
                               
                            </div> 
                        </div>
                    </div>

                    <div class="row mb-3">
                        <h4>Competitor Analysis</h4>
                        <hr class="mt-3">
                       <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="competitoranalysis">Competitor Analysis</label>
                                <textarea class="form-control" rows="3" name="competitoranalysis" id="competitoranalysis" placeholder="Competitor Analysis">{{old('competitoranalysis')}}</textarea>
                               
                            </div> 
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

                    <div class="row mb-3">
                        <h4>Company Type</h4>
                        <hr class="mt-3">
                        <div class="col-md-12">
                            <div class="form-label pt-0">Lead Generating Company?*</div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="yes" value="1" >
                                <label class="form-label form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="no" value="0" checked="">
                                <label class="form-label form-check-label" for="no">No</label>
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

@section('js')
<script src="https://cdn.ckeditor.com/4.19.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'history' );
</script>
@endsection