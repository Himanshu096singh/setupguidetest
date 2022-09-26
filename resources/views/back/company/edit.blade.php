@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle pink_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">Company "<u>{{ucwords($company->name)}}</u>" Details</h3>
                  </div>
               </div>
            </div>
            <div class="white_card_body">
                <div class="white_box_tittle list_header">
                    <h4>Edit Company</h4>
                    <div class="box_right d-flex lms_block">
                       <div class="add_button ms-2">
                          <a href="{{route('admin.company.index')}}" class="btn_1"><i class="fas fa-plus f_s_14 me-2"></i> View Company </a>
                       </div>
                    </div>
                 </div>
                <hr>
               <div class="card-body">
                  <form method="post" action="{{route('admin.company.update', $company->id)}}" enctype='multipart/form-data'> 
                    @csrf
                    @method('PATCH')
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="Name">Company Name*</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="Name" value="{{ old('name', $company->name) }}" placeholder="Category Name">
                           @error('name')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="slug">Company Slug* </label>
                           <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $company->slug) }}" placeholder="Category Slug" >
                           @error('slug')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="category">Category*</label>
                           <select class="form-select form-control @error('category') is-invalid @enderror" name="category" id="category">
                                <option value="">Select Category</option>
                                @foreach($category as $list)
                                    <option value="{{$list->id}}" @if($company->category_id == $list->id) {{"selected"}} @endif>{{$list->name}}</option>
                                @endforeach
                           </select>
                           @error('category')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="file">Image*</label>
                           <img src="{{asset($company->image)}}" width="60px" class="image-responsive">
                           <input type="hidden" name="oldimage" value="{{$company->image}}">
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file" value="{{ old('image', $company->image) }}" placeholder="file">
                           @error('image')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="alt">Alt*</label>
                           <input type="text" name="alt" class="form-control @error('alt') is-invalid @enderror" id="alt" value="{{ old('alt', $company->alt) }}" placeholder="Image Alt" >
                           @error('alt')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-label col-sm-1 pt-0">Status*</div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="active" value="1" @if($company->status == 1)  {{"checked"}} @endif>
                                <label class="form-label form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="deactive" value="0" @if($company->status == 0)  {{"checked"}} @endif">
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
                                <input type="text" name="headquarter" class="form-control" value="{{old('headquarter', $company->headquarter)}}" id="headquarter" placeholder="Head Quarter">
                            </div>    
                            <div class="mb-3">
                                <label class="form-label" for="founder">Founder</label>
                                <input type="text" name="founder" class="form-control" value="{{old('founder',$company->founder)}}" id="founder" placeholder="Founder">
                           </div>
                            <div class="mb-3">
                                 <label class="form-label" for="ceo">CEO</label>
                                 <input type="text" name="ceo" class="form-control" value="{{old('ceo', $company->ceo)}}" id="ceo" placeholder="CEO">
                            </div> 
                            <div class="mb-3">
                                <label class="form-label" for="companynumber">Company Number</label>
                                <input type="text" name="companynumber" class="form-control" value="{{old('companynumber', $company->companynumber)}}" id="companynumber" placeholder="Company Number">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="mosthearedbrand">Most Heared Brand</label>
                                <input type="text" name="mosthearedbrand" class="form-control" value="{{old('mosthearedbrand', $company->mosthearedbrand)}}" id="mosthearedbrand" placeholder="Inception Date">
                            </div> 
                            <div class="mb-3">
                                <label class="form-label" for="insceptiondate">Inception Date</label>
                                <input type="text" name="insceptiondate" class="form-control" value="{{old('insceptiondate', $company->insceptiondate)}}" id="insceptiondate" placeholder="Inception Date">
                            </div> 
                            <div class="mb-3">
                                <label class="form-label" for="totalassets">Total Assets</label>
                                <input type="text" name="totalassets" class="form-control" value="{{old('totalassets', $company->totalassets)}}" id="totalassets" placeholder="Total Assets ">
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="history">History</label>
                            <textarea class="form-control" rows="3" name="history" id="history" placeholder="History">{{old('history', $company->history)}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <h4>Market Share And Current Stage</h4>
                        <hr class="mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="namarketshareimageme">Market Share Image: </label>
                                <input type="hidden" value="{{$company->namarketshareimageme}}" name="oldmarketrshareimage">
                                @if($company->namarketshareimageme)
                                    <img src="{{url($company->namarketshareimageme)}}" class="image-responsive" width="120px"> 
                                @endif
                                <input type="file" name="marketshareimage" class="form-control" id="marketshareimage" value="" placeholder="Market Share Image">
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="marketsharecontent">Market Share Content</label>
                                <textarea class="form-control" rows="3" name="marketsharecontent" id="maxlength-textarea" placeholder="Market Share">{{old('marketsharecontent', $company->marketshare)}}</textarea>
                            </div> 
                        </div>
                    </div>

                    <div class="row mb-3">
                        <h4>Competitor Analysis</h4>
                        <hr class="mt-3">
                       <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="competitoranalysis">Competitor Analysis</label>
                                <textarea class="form-control" rows="3" name="competitoranalysis" id="competitoranalysis" placeholder="Competitor Analysis">{{old('competitoranalysis',$company->competitoranalysis)}}</textarea>
                               
                            </div> 
                        </div>
                    </div>


                    <div class="row mb-3">
                        <h4>Meta Information</h4>
                        <hr class="mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="metatitle">Meta Title*</label>
                                <input type="text" name="metatitle" class="form-control @error('metatitle') is-invalid @enderror" value="{{ old('metatitle', $company->metatitle) }}" id="metatitle" placeholder="Meta Title">
                                @error('metatitle')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>    
                            <div class="mb-3">
                                 <label class="form-label" for="metakeywords">Meta Keywords*</label>
                                 <input type="text" name="metakeywords" class="form-control @error('metakeywords') is-invalid @enderror" value="{{ old('metakeywords', $company->metakeywords) }}" id="metakeywords" placeholder="Meta Keywords">
                                 @error('metakeywords')  <p class="text-danger">{{ $message }} </p> @enderror
                              </div>  
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="metakeywords">Meta Description*</label>
                            <textarea class="form-control @error('metadescription') is-invalid @enderror" maxlength="300" rows="3" name="metadescription" id="maxlength-textarea" placeholder="This textarea has a limit of 300 chars." spellcheck="false">{{ old('metadescription', $company->metadescription) }}</textarea>
                            @error('metadescription')  <p class="text-danger">{{ $message }} </p> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                     <h4>Company Type</h4>
                     <hr class="mt-3">
                     <div class="col-md-12">
                         <div class="form-label pt-0">Lead Generating Company?*</div>
                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="type" id="yes" value="1" @if($company->type == 1)  {{"checked"}} @endif>
                             <label class="form-label form-check-label" for="yes">Yes</label>
                         </div>
                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="type" id="no" value="0" @if($company->type == 0)  {{"checked"}} @endif>
                             <label class="form-label form-check-label" for="no">No</label>
                         </div>
                 
                     </div>
                 </div>

                    <button type="submit" class="btn btn-success">Update</button> <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Back</a>
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
                   <h3 class="m-0 text_white">Company FAQ For {{ucwords($company->name)}}</h3>
                   
                </div>
                
             </div>
          </div>
          <div class="white_card_body">
             
             <div class="card-body">
                <form action="{{route('admin.company.faq')}}" method="post">
                   @php
                      $eid = Crypt::encryptString($company->id); 
                   @endphp
                   <input type="hidden" value="{{$eid}}" name="companyid">
                   @csrf
                   @foreach($company->faqs as $faqs)
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
 <div class="container-fluid p-0">
   <div class="row justify-content-center">
      <div class="white_card card_height_100 mb_30">
         <div class="white_card_header white_box_tittle blue_bg">
            <div class="box_header m-0">
               <div class="main-title">
                  <h3 class="m-0 text_white">Products list For {{ucwords($company->name)}}</h3>
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
                      @foreach($company->products as $index=>$list)
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
                             <a href="{{ route('admin.product.edit',$eid) }}" type="button" class="btn mb-3 btn-primary"><i class="fas fa-edit"></i></a> 

                                <form action="{{ route('admin.product.destroy', $eid) }}" method="POST" style="display:inline" id="form1" style="display: inline;">
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

@section('js')
<script src="https://cdn.ckeditor.com/4.19.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'history' );
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