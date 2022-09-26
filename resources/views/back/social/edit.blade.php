@extends('layouts.back')
@section('content')
<div class="main_content_iner ">
   
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
           <div class="white_card card_height_100 mb_30">
              <div class="white_card_header white_box_tittle pink_bg">
                 <div class="box_header m-0">
                    <div class="main-title">
                       <h3 class="m-0 text_white">Update Social Links</h3>
                    </div>
                 </div>
              </div>
              <div class="white_card_body">
                 <div class="white_box_tittle list_header">
                    <h4>Social Links</h4>
                 </div>
                 <div class="card-body">
                    <form method="post" action="{{route('admin.sociallink.update',$link->id)}}">
                       @csrf
                       @method('patch')
                       {{-- <input type="hidden" value="{{$link->id}}" name="id"> --}}
                       <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="type">Type* </label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ucwords($link->name)}}" placeholder="Social Link URL" readonly>
                            @error('type')  
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                         </div>
                          <div class="col-md-6">
                             <label class="form-label" for="url">URL* </label>
                             <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{old('url', $link->url)}}" placeholder="Social Link URL">
                             @error('url')  
                             <p class="text-danger">{{ $message }} </p>
                             @enderror
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

</div>

@stop
@section('js')
@endsection