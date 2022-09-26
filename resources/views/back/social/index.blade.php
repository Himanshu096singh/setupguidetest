@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   <div class="container-fluid p-0">
      <div class="row justify-content-center">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle pink_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white">Social Links</h3>
                  </div>
               </div>
            </div>
            <div class="white_card_body">
               <div class="white_box_tittle list_header">
                  <h4>Social Links</h4>
               </div>
               <div class="card-body">
                  <form method="post" action="{{route('admin.sociallink.store')}}">
                     @csrf
                     <div class="row mb-3">
                        <div class="col-md-6">
                           <label class="form-label" for="type">Social Link Type</label>
                           <select class="form-select form-control @error('type') is-invalid @enderror" name="type" id="type">
                              <option value="">Select Type</option>
                              <option value="facebook" @if(old('type') == 'facebook') {{"selected"}} @endif>Facebook</option>
                              <option value="twitter" @if(old('type') == 'twitter') {{"selected"}} @endif>Twitter</option>
                              <option value="instagram" @if(old('type') == 'instagram') {{"selected"}} @endif>Instagram</option>
                              <option value="pinterest" @if(old('type') == 'pinterest') {{"selected"}} @endif>Pinterest</option>
                              <option value="youtube" @if(old('type') == 'youtube') {{"selected"}} @endif>Youtube</option>
                              <option value="linked-in" @if(old('type') == 'linked-in') {{"selected"}} @endif>Linked In </option>
                           </select>
                           @error('type')  
                           <p class="text-danger">{{ $message }} </p>
                           @enderror
                        </div>
                        <div class="col-md-6">
                           <label class="form-label" for="url">URL* </label>
                           <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{old('url')}}" placeholder="Social Link URL">
                           @error('url')  
                           <p class="text-danger">{{ $message }} </p>
                           @enderror
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
   <div class="row justify-content-center">
      <div class="col-lg-12">
         <div class="white_card card_height_100 mb_30">
            <div class="white_card_header white_box_tittle parpel_bg">
               <div class="box_header m-0">
                  <div class="main-title">
                     <h3 class="m-0 text_white"> All Social Links</h3>
                  </div>
               </div>
            </div>
            <div class="white_card_body">
               <div class="table-responsive m-b-30">
                  <table class="table table-striped">
                     <thead class="table-dark">
                        <tr>
                           <th scope="col">Sr.No.</th>
                           <th scope="col">Social Type</th>
                           <th scope="col">URL</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody class="">
                        @php $i=1; @endphp
                        @foreach($link as $list)
                        <tr class="tbs">
                           <td><span class="badge bg-dark">{{$i}} </span></td>
                           <td><b>{{ucwords($list->name)}}</b></td>
                           <td>{{$list->url}}</td>
                            @php $eid = Crypt::encryptString($list->id); @endphp
                           <td>
                              <a href="{{ route('admin.sociallink.edit',$eid) }}" type="button" class="btn mb-3 btn-primary"><i class="fas fa-edit"></i></a> 
                              <form action="{{ route('admin.sociallink.destroy', $eid) }}" method="POST" style="display:inline" id="form1" style="display: inline;">
                                 <input type="hidden" name="_method" value="DELETE">
                                 @csrf
                                 <button type="submit" class="btn mb-3 btn-danger show_confirm"><i class="fas fa-trash "></i></button>
                              </form>
                           </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                     </tbody>
                  </table>
               </div>
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
@endsection